<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    function view(){
        $allUnits = Unit::all();
        return view('backend.pages.Unit.viewUnit',[
            'allUnits'=>$allUnits,
        ]);
    }
    function add(){
        return view('backend.pages.Unit.addUnit');
    }
    function store(Request $request){
        $this->validate($request,[
            'name'        =>'required',
          ]);
            $unit  = new Unit();
            $unit->name        = $request->name;
            $unit->created_by  = Auth::user()->id;
            $unit->save();

        return redirect()->route('units.view')->with('success','data inserted successfully');
    }
    function edit($id){
       $unit =  Unit::find($id);
        return view('backend.pages.Unit.editUnit',[
            'unit'=>$unit,
        ]);
    }
    function update(Request $request){
        $this->validate($request,[
            'name'        =>'required',
          ]);
            $unit =  Unit::find($request->id);
            $unit->name        = $request->name;
            $unit->updated_by  = Auth::user()->id;
            $unit->save();

        return redirect()->route('units.view')->with('success','data updated successfully');
    }
    function delete($id){
        $unit =  Unit::find($id);
        $unit->delete();
        return redirect()->route('units.view')->with('success','data updated successfully');
     }
}
