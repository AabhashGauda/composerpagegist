<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;
class Register extends Controller
{
    //
    public function registerUserForm(Request $request){
        return view('register');
    }

    public function registerUser(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        Auth::create($request->all());
        return back()->with('success','Thank you for the message');
    }
}
