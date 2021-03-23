<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\Model\Payment;
use App\Model\PaymentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class CustomerController extends Controller
{
    function view(){
        $allCustomers = Customer::all();
        return view('backend.pages.Customer.viewCustomer',[
            'allCustomers'=>$allCustomers,
        ]);
    }
    function add(){
        return view('backend.pages.Customer.addCustomer');
    }
    function store(Request $request){
        $this->validate($request,[
            'name'        =>'required|min:3',
            'email'       =>'required|unique:suppliers,email',
            'mobile_no'   =>'required|numeric',
            'address'     =>'required',
          ]);
            $customer  = new Customer();
            $customer->name        = $request->name;
            $customer->mobile_no   = $request->mobile_no;
            $customer->email       = $request->email;
            $customer->address     = $request->address;
            $customer->created_by  = Auth::user()->id;
            $customer->save();

        return redirect()->route('customers.view')->with('success','data inserted successfully');
    }
    function edit($id){
       $customer =  Customer::find($id);
        return view('backend.pages.Customer.editCustomer',[
            'customer'=>$customer,
        ]);
    }
    function update(Request $request){
        $this->validate($request,[
            'name'        =>'required|min:3',
            'email'       =>'required|',
            'mobile_no'   =>'required|numeric',
            'address'     =>'required',
          ]);
            $customer =  Customer::find($request->id);
            $customer->name        = $request->name;
            $customer->mobile_no   = $request->mobile_no;
            $customer->email       = $request->email;
            $customer->address     = $request->address;
            $customer->updated_by  = Auth::user()->id;
            $customer->save();

        return redirect()->route('customers.view')->with('success','data updated successfully');
    }
    function delete($id){
        $Customer =  Customer::find($id);
        $Customer->delete();
        return redirect()->route('customers.view')->with('success','data updated successfully');
     }

     function creditCustomer(){
        $allData = Payment::whereIn('paid_status',['partial_paid','full_due'])->get();
        return view('backend.pages.Customer.creditCustomer',[
            'allData'=>$allData,
        ]);
     }
     function creditCustomerPdf(){
        $data['allData'] = Payment::whereIn('paid_status',['partial_paid','full_due'])->get();
        $pdf             = PDF::loadView('backend.Pdf.customer-credit-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('customer-credit.pdf');
     }
     function editInvoice($invoice_id){
        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pages.Customer.edit-invoice',[
            'payment'=>$payment,
        ]);
     }

     function updateInvoice(Request $request,$invoice_id){
         $this->validate($request,[
            'paid_status'=>'required',
            'date'=>'required'
         ]);
       if($request->new_due_amount<$request->paid_amount){
        return redirect()->back()->with('error','you have entered too amount than the due amount');
       }else{
           $payment = Payment::where('invoice_id',$invoice_id)->first();
           $payment_details = new PaymentDetails();
           $payment->paid_status = $request->paid_status;
           if($request->paid_status == 'full_paid'){
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_due_amount;
            $payment->due_amount = '0';
            $payment_details->current_paid_amount=$request->new_due_amount;
           }else if($request->paid_status == 'partial_paid'){
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
            $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
            $payment_details->current_paid_amount=$request->paid_amount;
           }
           $payment->save();
           $payment_details->invoice_id = $invoice_id;
           $payment_details->date = date('Y-m-d',strtotime($request->date));
           $payment_details->updated_by = Auth::user()->id;
           $payment_details->save();
       }
       return redirect()->route('customers.credit')->with('success','Invoice updated successfully');
     }
     function customerInvoiceDetailsPdf($invoice_id){
        $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
        $pdf             = PDF::loadView('backend.Pdf.customer-invoice-details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('customer-invoice-details.pdf');
     }
     function customerPaid(){
        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pages.Customer.paidCustomer',[
            'allData'=>$allData,
        ]);
     }
     function customerPaidPdf(){
        $data['allData'] = Payment::where('paid_status','!=','full_due')->get();
        $pdf             = PDF::loadView('backend.Pdf.customer-paid-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('customer-paid.pdf');
     }
     function customerSingleReport(){
         $customers = Customer::all();
         return view('backend.pages.Customer.customer-wise-report',[
             'customers'=>$customers,
         ]);
     }
     function customerWiseCreditPdf(Request $request){
        $data['allData'] = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['partial_paid','full_due'])->get();
        $pdf   = PDF::loadView('backend.Pdf.customer-wise-credit-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('customer-paid.pdf');
     }
     function customerWisePaidPdf(Request $request){
        $data['allData'] = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
        $pdf   = PDF::loadView('backend.Pdf.customer-wise-paid-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('customer-paid.pdf');
    }
}

