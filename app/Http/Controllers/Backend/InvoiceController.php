<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Customer;
use App\Model\Invoice;
use App\Model\InvoiceDetails;
use App\Model\Payment;
use App\Model\PaymentDetails;
use App\Model\Product;
use App\Model\Purchase;
use App\Model\Supplier;
use App\Model\Unit;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    function view(){
        $allInvoices = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
        return view('backend.pages.Invoice.viewInvoice',[
            'allInvoices'=>$allInvoices,
        ]);
    }
    function add(){
        $categories   = Category::all();
        $customers    = Customer::all();
        $date         = date('Y-m-d');
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if($invoice_data==null){
           $firstReg = '0';
           $invoice_no = $firstReg+1;
        }else{
            $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
            $invoice_no = $invoice_data+1;
        }
        return view('backend.pages.Invoice.addInvoice',[
            'categories'  =>$categories,
            'customers'   =>$customers,
            'invoice_no'  =>$invoice_no,
            'date'        =>$date,
        ]);
    }
    function store(Request $request){
        if($request->category_id == null){
            return redirect()->back()->with('error','You do not select any item!');
        }else{
            if($request->paid_amount>$request->estimated_amount){
                return redirect()->back()->with('error','you have entered too amount than the total amount');
            }else{
                $invoice = new Invoice();
                $invoice->invoice_no     = $request->invoice_no;
                $invoice->date           = date('Y-m-d',strtotime($request->date));
                $invoice->description    = $request->description;
                $invoice->status         = '0';
                $invoice->created_by     = Auth::user()->id;
                DB::transaction(function() use($request,$invoice){
                   if($invoice->save()){
                      $count_category = count($request->category_id);
                      for($i=0;$i<$count_category;$i++){
                        $invoice_details = new InvoiceDetails();
                        $invoice_details->invoice_id    = $invoice->id;
                        $invoice_details->category_id   = $request->category_id[$i];
                        $invoice_details->product_id    = $request->product_id[$i];
                        $invoice_details->date          = date('Y-m-d',strtotime($request->date));
                        $invoice_details->selling_qty   = $request->selling_qty[$i];
                        $invoice_details->unit_price    = $request->unit_price[$i];
                        $invoice_details->selling_price = $request->selling_price[$i];
                        $invoice_details->status        = '0';
                        $invoice_details->save();
                      }
                      if($request->customer_id=='0'){
                          $customer = new Customer();
                          $customer->name        = $request->name;
                          $customer->mobile_no   = $request->mobile_no;
                          $customer->address     = $request->address;
                          $customer->created_by  = Auth::user()->id;
                          $customer->save();
                          $customer_id = $customer->id;
                      }else{
                          $customer_id = $request->customer_id;
                      }

                      $payment = new Payment();
                      $paymentDetails = new PaymentDetails();
                      $payment->invoice_id      = $invoice->id;
                      $payment->customer_id     = $customer_id;
                      $payment->paid_status     = $request->paid_status;
                      $payment->discount_amount = $request->discount_amount;
                      $payment->total_amount    = $request->estimated_amount;

                      if($request->paid_status == 'full_paid'){
                        $payment->paid_amount                = $request->estimated_amount;
                        $payment->due_amount                 = '0';
                        $paymentDetails->current_paid_amount = $request->estimated_amount;
                      }
                      if($request->paid_status == 'full_due'){
                        $payment->paid_amount                = '0';
                        $payment->due_amount                 = $request->estimated_amount;
                        $paymentDetails->current_paid_amount ='0';
                      }
                      if($request->paid_status == 'partial_paid'){
                        $payment->paid_amount                = $request->paid_amount;
                        $payment->due_amount                 = $request->estimated_amount-$request->paid_amount;
                        $paymentDetails->current_paid_amount = $request->paid_amount;
                      }
                      $payment->save();
                      $paymentDetails->invoice_id = $invoice->id;
                      $paymentDetails->date       = date('Y-m-d',strtotime($request->date));
                      $paymentDetails->save();
                   }
                });
            }
            return redirect()->route('invoices.pending')->with('success','data inserted successfully');
        }
    }

    function delete($id){
        $invoice =  Invoice::find($id);
        $invoice->delete();
        InvoiceDetails::where('invoice_id',$invoice->id)->delete();
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetails::where('invoice_id',$invoice->id)->delete();
        return redirect()->route('invoices.pending')->with('success','data deleted successfully');
     }

     function pending(){
        $allInvoices = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.pages.Invoice.pendingInvoice',[
            'allInvoices'=>$allInvoices,
        ]);
     }
     function approve($id){
        $invoice =  Invoice::with(['invoice_details'])->find($id);
        return view('backend.pages.Invoice.approveInvoice',[
            'invoice'=>$invoice,
        ]);
     }
     function approveStore(Request $request,$id){
        foreach($request->selling_qty as $key=>$val){
            $invoice_details = InvoiceDetails::where('id',$key)->first();
            $product         = Product::where('id',$invoice_details->product_id)->first();
            if($product->quantity<$request->selling_qty[$key]){
                return redirect()->back()->with('error','sorry! you have approved maximum value');
            }
        }
        $invoice              = Invoice::find($id);
        $invoice->approved_by = Auth::user()->id;
        $invoice->status      = '1';
        
        DB::transaction(function() use($request,$invoice,$id){
            foreach($request->selling_qty as $key=>$val){
                $invoice_details           = InvoiceDetails::where('id',$key)->first();
                $invoice_details->status   = '1';
                $invoice_details ->save();
                $product                   = Product::where('id',$invoice_details->product_id)->first();
                $product->quantity         = ((float)($product->quantity))-((float)($request->selling_qty[$key]));
                $product->save();
            }
            $invoice->save();
        });
        return redirect()->route('invoices.view')->with('success','Invoice approved successfully');
     }
     function invoicePrintList(){
        $allInvoices = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
        return view('backend.pages.Invoice.pos-invoice-list',[
            'allInvoices'=>$allInvoices,
        ]);
     }
     function invoicePrint($id){
        $data['invoice'] = Invoice::with(['invoice_details'])->find($id);
        $pdf             = PDF::loadView('backend.Pdf.invoice-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Invoice.pdf');
     }
     function dailyReport(){
         return view('backend.pages.Invoice.daily-invoice-report');
     }
     function dailyInvoicePdf(Request $request){
        $start_date           = date('Y-m-d',strtotime($request->start_date));
        $end_date             = date('Y-m-d',strtotime($request->end_date));
        $data['allInvoices']  = Invoice::whereBetween('date',[$start_date,$end_date])->where('status','1')->get();
        $data['start_date']   = date('Y-m-d',strtotime($request->start_date));
        $data['end_date']     = date('Y-m-d',strtotime($request->end_date));
        $pdf                  = PDF::loadView('backend.Pdf.daily-invoice-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Daily-Invoice_Report.pdf');
     }
     
}



