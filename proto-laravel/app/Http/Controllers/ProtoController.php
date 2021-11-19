<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtoController extends Controller
{
    public function logIn() {
        return view('auth.logIn');
    }

    public function signIn() {
        return view('auth.signIn');
    }
}
