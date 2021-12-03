<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function logIn() {
        return view ('auth.logIn');
    }

    public function store() {

        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors ([
                'message' => 'El correo o la contraseña no son válidos'
            ]);
        }

        return redirect()->to('/');
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/home');
    }
}
