<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    function view(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.pages.User.viewProfile',[
            'user'=>$user,
        ]);
    }
    function edit(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.pages.User.editProfile',[
            'user'=>$user,
        ]);
    }
    function update(Request $request){
        $user  = User::find(Auth::user()->id);

        $this->validate($request,[
            'gender'   =>'required',
            'name'     =>'required|min:3',
            'email'    =>'required',
            'image'    =>'mimes:jpg,jpeg,png',
          ]);
        //   hexdec(uniqid())
          $image = $request->image;
          if($image){
              if(file_exists($user->image)){
                 unlink($user->image);
              }
               $imageName=date('Y-m-d').'.'.$image->getClientOriginalExtension();
               Image::make($image)->resize(400,400)->save('upload/userprofileimg/'.$imageName);
               $imageUrl ='upload/userprofileimg/'.$imageName;

                $user->gender      = $request->gender;
                $user->image       = $imageUrl;
                $user->address     = $request->address;
                $user->name        = $request->name;
                $user->mobile      = $request->mobile;
                $user->email       = $request->email;
                $user->save();
  
                return redirect()->route('profiles.view')->with('success','profile updated successfully');
          }
         
          $user->gender      = $request->gender;
          $user->address     = $request->address;
          $user->name        = $request->name;
          $user->mobile      = $request->mobile;
          $user->email       = $request->email;
          $user->save();
  
          return redirect()->route('profiles.view')->with('success','profile updated successfully');
     }
     function passwordView(){
         return view('backend.pages.User.passwordView');
     }
     function passwordUpdate(Request $request){
        $this->validate($request,[
            'password'                 =>'required',
            'oldpass'                  =>'required|min:3',
            'password_confirmation'    =>'required',
          ]);
        
          $password=Auth::user()->password;
          $oldpass=$request->oldpass;
          $newpass=$request->password;
          $confirm=$request->password_confirmation;
          if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                $user=User::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                // Auth::logout();  
                return redirect()->route('profiles.view')->with('success','Password Changed Successfully ! Now Login with Your New Password');
             }else{
                return redirect()->route('profiles.passwordView')->with('error','New password and Confirm Password does not matched!');
             }     
           }else{
               return redirect()->route('profiles.passwordView')->with('error','Old Password does not matched!');
           }
        
    }
}
