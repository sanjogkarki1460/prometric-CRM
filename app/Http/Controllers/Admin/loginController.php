<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class loginController extends Controller
{
    public function loginForm(){
        return view('Admin.login');
    }

    public function loginCheck(Request $request)
    {
        $cretential = $request->only('email', 'password');

        if (AUTH::guard('admin')->attempt($cretential)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('login')->withErrors('email or password do not match');
        }

    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
