<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    //
   
    public function myprofile(){
        $user=Auth::user();
        
        return view('myprofile')->with([
            'name'=>$user->name,
            'email'=>$user->email,
        ]);
    }
    public function updateProfileView(){
        $user=Auth::user();
        
        return view('updateUser')->with([
            'name'=>$user->name,
            'email'=>$user->email
        ]);
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name'=>'required',
            // 'email'=>'required|email'
        ]);
        $user=Auth::user();
        $user->name=$request['name'];
        // $user->email=$request['email'];
        $user->save();
        return back()->with('message','Profile updated');
    }
}
