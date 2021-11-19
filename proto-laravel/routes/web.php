<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestControl;

Route::get('/', function () {
    return view('home');
});
