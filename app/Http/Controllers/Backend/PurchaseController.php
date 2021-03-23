<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Purchase;
use App\Model\Supplier;
use App\Model\Unit;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class PurchaseController extends Controller
{
    function view(){
        $allPurchases = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status',1)->get();
        return view('backend.pages.Purchase.viewPurchase',[
            'allPurchases'=>$allPurchases,
        ]);
    }
    function add(){
        $suppliers   = Supplier::all();
        $units       = Unit::all();
        $categories  = Category::all();
        $products    = Product::all();
        return view('backend.pages.Purchase.addPurchase',[
            'suppliers'   =>$suppliers,
            'units'       =>$units,
            'categories'  =>$categories,
            'products'    =>$products,
        ]);
    }
    function store(Request $request){
       
        if($request->category_id == null){
            return redirect()->back()->with('error','You do not select any item!');
        }else{
            $count_category = count($request->category_id);
            for($i=0;$i<$count_category;$i++){
              $purchase = new Purchase();
              $purchase->date=date('y-m-d',strtotime($request->date[$i]));
              $purchase->purchase_no=$request->purchase_no[$i];
              $purchase->supplier_id=$request->supplier_id[$i];
              $purchase->category_id=$request->category_id[$i];
              $purchase->product_id=$request->product_id[$i];
              $purchase->buying_qty=$request->buying_qty[$i];
              $purchase->unit_price=$request->unit_price[$i];
              $purchase->buying_price=$request->buying_price[$i];
              $purchase->description=$request->description[$i];
              $purchase->status=0;
              $purchase->created_by=Auth::user()->id;
              $purchase->save();
            }
            return redirect()->route('purchases.view')->with('success','data inserted successfully');

        }  
    }
   
    function delete($id){
        $purchase =  Purchase::find($id);
        $purchase->delete();
        return redirect()->route('purchases.view')->with('success','data deleted successfully');
     }

     function pending(){
        $allPurchasePendings = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.pages.Purchase.purchasePending',[
            'allPurchasePendings'=>$allPurchasePendings,
        ]);
     }
     function approve($id){
        $purchase =  Purchase::find($id);
        $product  =  Product::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity=$purchase_qty;
        $product->save();
        if($product->save()){
            $purchase->status=1;
            $purchase->save();
        }
        return redirect()->route('purchases.pending')->with('success','purchase approved successfully');
     }

     function purchaseReport(){
        return view('backend.pages.Purchase.daily-purchase-report');
     }
     function purchaseReportPdf(Request $request){
        $start_date           = date('Y-m-d',strtotime($request->start_date));
        $end_date             = date('Y-m-d',strtotime($request->end_date));
        $data['allPurchases'] = Purchase::whereBetween('date',[$start_date,$end_date])->where('status','1')
        ->orderBy('supplier_id')->orderBy('category_id')->orderBy('product_id')->get();
        $data['start_date']   = date('Y-m-d',strtotime($request->start_date));
        $data['end_date']     = date('Y-m-d',strtotime($request->end_date));
        $pdf                  = PDF::loadView('backend.Pdf.daily-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Daily-purchase_Report.pdf');
     }
}
