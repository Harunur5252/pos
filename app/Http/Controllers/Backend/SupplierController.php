<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    function view(){
        $allSuppliers = Supplier::all();
        return view('backend.pages.Supplier.viewSupplier',[
            'allSuppliers'=>$allSuppliers,
        ]);
    }
    function add(){
        return view('backend.pages.Supplier.addSupplier');
    }
    function store(Request $request){
        $this->validate($request,[
            'name'        =>'required|min:3',
            'email'       =>'required|unique:suppliers,email',
            'mobile_no'   =>'required|numeric',
            'address'     =>'required',
          ]);
            $supplier  = new Supplier();
            $supplier->name        = $request->name;
            $supplier->mobile_no   = $request->mobile_no;
            $supplier->email       = $request->email;
            $supplier->address     = $request->address;
            $supplier->created_by  = Auth::user()->id;
            $supplier->save();

        return redirect()->route('suppliers.view')->with('success','data inserted successfully');
    }
    function edit($id){
       $supplier =  Supplier::find($id);
        return view('backend.pages.Supplier.editSupplier',[
            'supplier'=>$supplier,
        ]);
    }
    function update(Request $request){
        $this->validate($request,[
            'name'        =>'required|min:3',
            'email'       =>'required|',
            'mobile_no'   =>'required|numeric',
            'address'     =>'required',
          ]);
            $supplier =  Supplier::find($request->id);
            $supplier->name        = $request->name;
            $supplier->mobile_no   = $request->mobile_no;
            $supplier->email       = $request->email;
            $supplier->address     = $request->address;
            $supplier->updated_by  = Auth::user()->id;
            $supplier->save();

        return redirect()->route('suppliers.view')->with('success','data updated successfully');
    }
    function delete($id){
        $supplier =  Supplier::find($id);
        $supplier->delete();
        return redirect()->route('suppliers.view')->with('success','data updated successfully');
     }
}
