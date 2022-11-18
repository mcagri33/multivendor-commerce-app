<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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



}
