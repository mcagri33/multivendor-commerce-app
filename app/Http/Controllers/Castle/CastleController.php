<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CastleController extends Controller
{
    public function dashboard()
    {
        return view('castle.index');
    }

    public function login()
    {
        return view('castle.castle_login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|email'
        ]);

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'],
            'password' => $check['password'], 'status' => 1])) {
            return redirect()->route('castle.dashboard')->with('success', 'Login Success!');
        } else {
            return back()->with('error', 'Wrong Email or password!');
        }
    }

    public function castleLogout() {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'Logout Success!');
    }

}
