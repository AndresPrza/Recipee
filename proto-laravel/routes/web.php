<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProtoController;
use App\Http\Controllers\SigninConrtoller;
use App\Http\Controllers\LoginConrtoller;
use App\Http\Controllers\SessionsController;


// === HOME ===
Route::get('/', function () {
    return view('home');
});

// === LOG/SIGN-IN ===

Route::get('/signIn', [ProtoController::class,'signIn'])->name('signIn');
Route::get('/logIn', [ProtoController::class,'logIn'])->name('logIn');