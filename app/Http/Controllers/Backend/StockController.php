<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;
use Illuminate\Http\Request;
use PDF;
class StockController extends Controller
{
    function stockReport(){
        $allProducts = Product::orderBy('supplier_id')->orderBy('category_id')->get();
        return view('backend.pages.Stock.stock-report',[
            'allProducts'=>$allProducts,
        ]);
    }
    function stockReportPdf(){
        $data['allProducts'] = Product::orderBy('supplier_id')->orderBy('category_id')->get();
        $pdf  = PDF::loadView('backend.Pdf.product-stock-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('product-stock.pdf');
    }
    function stockSupplierProductWiseReport(){
        $suppliers  = Supplier::all();
        $categories = Category::all();
        return view('backend.pages.Stock.stock-supplier-product-wise-report',[
            'suppliers' =>$suppliers,
            'categories'=>$categories,
        ]);
    }
    function stockSupplierWiseReportPdf(Request $request){
        $this->validate($request,[
            'supplier_id'=>'required',
          ]);
        $data['allProducts'] = Product::orderBy('supplier_id')->orderBy('category_id')->where('supplier_id',$request->supplier_id)->get();
        $pdf  = PDF::loadView('backend.Pdf.supplier-wise-product-stock-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('supplier-wise-product-stock.pdf');
    }
    function stockProductWiseReportPdf(Request $request){
        $this->validate($request,[
            'category_id'=>'required',
            'product_id' =>'required',
          ]);
        $data['product'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        $pdf  = PDF::loadView('backend.Pdf.product-wise-product-stock-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('product-wise-product-stock.pdf');
    }
}
