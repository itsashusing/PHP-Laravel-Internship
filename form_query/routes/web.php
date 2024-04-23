<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::controller(productController::class)->group(function () {
    Route::get('/', 'allProducts')->name('home');
    Route::get('/delete/{id}', 'deleteProduct')->name('delete');
    Route::post('/add', 'addProduct')->name('addProduct');
    Route::get('/update/{id}', 'updateProduct')->name('updateProduct');
    Route::post('/updateproduct/{id}', 'updateP')->name('updateP');
});

Route::view('/addproduct', 'newproduct');
// Route::view('/updateproduct', 'updateproduct');