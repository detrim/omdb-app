<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->username == 'aldmic' && $request->password == '123abc123') {
            session(['user'=>'aldmic']);
            return redirect('/movies');
        }

        return back()->with('error','Username / Password salah');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
