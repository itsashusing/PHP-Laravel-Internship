<?php

use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;


Route::get('/', [usercontroller::class, 'showProducts']);
Route::get('/add', [usercontroller::class, 'addProduct']);
Route::get('/product/{id}', [usercontroller::class, 'singleProduct'])->name('view.singleproduct');