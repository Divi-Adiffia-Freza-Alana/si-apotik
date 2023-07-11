<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    //
    public function index(){

        return view('login');

    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            Session::flash('status', 'success');
            Session::flash('message', 'Login Berhasil');
 
            return redirect()->intended('/');
        }


 
       /* return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');*/

        Session::flash('status', 'fail');
        Session::flash('message', 'Login Gagal');

        return redirect('/login');

    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');

    }

    
    



}
