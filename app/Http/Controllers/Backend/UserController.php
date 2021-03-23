<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    function view(){
        $allUsers = User::all();
        return view('backend.pages.User.viewUser',[
            'allUsers'=>$allUsers,
        ]);
    }
    function add(){
       return view('backend.pages.User.add');
    }
    function store(Request $request){
        $this->validate($request,[
          'usertype'    =>'required',
          'name'        =>'required|min:3',
          'email'       =>'required|unique:users,email',
          'password'    =>'required',
          'password2'   =>'required',
        ]);
        $userData  = new User();
        $userData->usertype    = $request->usertype;
        $userData->name        = $request->name;
        $userData->mobile      = $request->mobile;
        $userData->email       = $request->email;
        $userData->password    = bcrypt($request->password);
        $userData->save();
        return redirect()->route('users.view')->with('success','data inserted successfully');
     }
     function edit($id){
       $user  = User::find($id);
       return view('backend.pages.User.edit',[
         'user'=>$user,
       ]);
     }
     function update(Request $request){
        $user  = User::find($request->id);

        $this->validate($request,[
            'usertype' =>'required',
            'name'     =>'required|min:3',
            'email'    =>'required',
          ]);
         
          $user->usertype    = $request->usertype;
          $user->name        = $request->name;
          $user->mobile      = $request->mobile;
          $user->email       = $request->email;
          $user->save();
  
          return redirect()->route('users.view')->with('success','data updated successfully');
     }
     function delete($id){
        $user  = User::find($id);
        if(file_exists($user->image)){
            unlink($user->image);
        }
        $user->delete();
        return redirect()->route('users.view')->with('success','data deleted successfully');
      }
}
