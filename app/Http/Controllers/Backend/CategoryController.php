<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function view(){
        $allCategories = Category::all();
        return view('backend.pages.Category.viewCategory',[
            'allCategories'=>$allCategories,
        ]);
    }
    function add(){
        return view('backend.pages.Category.addCategory');
    }
    function store(Request $request){
        $this->validate($request,[
            'name'        =>'required',
          ]);
            $category  = new Category();
            $category->name        = $request->name;
            $category->created_by  = Auth::user()->id;
            $category->save();

        return redirect()->route('categories.view')->with('success','data inserted successfully');
    }
    function edit($id){
       $category =  Category::find($id);
        return view('backend.pages.Category.editCategory',[
            'category'=>$category,
        ]);
    }
    function update(Request $request){
        $this->validate($request,[
            'name'        =>'required',
          ]);
            $category =  Category::find($request->id);
            $category->name        = $request->name;
            $category->updated_by  = Auth::user()->id;
            $category->save();

        return redirect()->route('categories.view')->with('success','data updated successfully');
    }
    function delete($id){
        $category =  Category::find($id);
        $category->delete();
        return redirect()->route('categories.view')->with('success','data updated successfully');
     }
}
