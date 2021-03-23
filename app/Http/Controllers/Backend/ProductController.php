<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function view(){
        $allProducts = Product::all();
        return view('backend.pages.Product.viewProduct',[
            'allProducts'=>$allProducts,
        ]);
    }
    function add(){
        $suppliers   = Supplier::all();
        $units       = Unit::all();
        $categories  = Category::all();
        return view('backend.pages.Product.addProduct',[
            'suppliers'   =>$suppliers,
            'units'       =>$units,
            'categories'  =>$categories,
        ]);
    }
    function store(Request $request){
        $this->validate($request,[
            'name'              =>'required|min:3',
            'supplier_id'       =>'required',
            'unit_id'           =>'required',
            'category_id'       =>'required',
          ]);
            $product  = new Product();
            $product->name          = $request->name;
            $product->supplier_id   = $request->supplier_id;
            $product->unit_id       = $request->unit_id;
            $product->category_id   = $request->category_id;
            $product->quantity      = '0';
            $product->created_by    = Auth::user()->id;
            $product->save();

        return redirect()->route('products.view')->with('success','data inserted successfully');
    }
    function edit($id){
        $product     =  Product::find($id);
        $suppliers   = Supplier::all();
        $units       = Unit::all();
        $categories  = Category::all();
        return view('backend.pages.Product.editProduct',[
            'product'     =>$product,
            'suppliers'   =>$suppliers,
            'units'       =>$units,
            'categories'  =>$categories,
        ]);
    }
    function update(Request $request){
        $this->validate($request,[
            'name'              =>'required|min:3',
            'supplier_id'       =>'required',
            'unit_id'           =>'required',
            'category_id'       =>'required',
          ]);
            $product =  Product::find($request->id);
            $product->name          = $request->name;
            $product->supplier_id   = $request->supplier_id;
            $product->unit_id       = $request->unit_id;
            $product->category_id   = $request->category_id;
            $product->quantity      = '0';
            $product->updated_by    = Auth::user()->id;
            $product->save();

        return redirect()->route('products.view')->with('success','data updated successfully');
    }
    function delete($id){
        $product =  Product::find($id);
        $product->delete();
        return redirect()->route('products.view')->with('success','data updated successfully');
     }
}
