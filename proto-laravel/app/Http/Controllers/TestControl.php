<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestControl extends Controller
{
    public function logIn() {
        return view('logIn');
    }

    public function signIn() {
        return view('signIn');
    }
}
