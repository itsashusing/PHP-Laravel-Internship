<?php

use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('register', [usercontroller::class, 'register'])->name('register');

Route::get('/', function () {
    return view('welcome');
});
