<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //make new contact page controller
    public function index()
    {
        return view('auth.login')->with([
            'title' => 'login Page'
        ]);
    }
    public function login(Request $request)
    { // use csrf in form submits
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
       
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        return redirect('register')->withError('Details not valid');
    }
    public function registerView()
    {
        return view('auth.register')->with([
            'title' => 'register page'
        ]);
    }
    public function register(Request $request)
    {
        echo "hello";
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            // 'password'=>$request->password
        ]);


        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        dd($request->all());
        //else
        return redirect('register')->withError('Error to Register');
    }

    public function home()
    {
        return view('home');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
