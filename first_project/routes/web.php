<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
// Route::get('/post/{id?}', function (string $id = "nothing") {
//     // return view('post');
//     return "<h1> Post Id : $id </h1>";
// });
// Route::get('/post/{id?}/comment/{commentid?}', function (string $id = null, string $commentid = null) {
//     // return view('post');
//     return "<h1> Post Id : $id </h1><h3> Post Id : $commentid </h3>";
// });
// Route::view('/post', 'post');
// Route::get('/post/{id?}', function (string $id = "nothing") {
//     // return view('post');
//     return "<h1> Post Id : $id </h1>";
// })->whereNumber('id');


// Route::get('/post/about', function () {
//     // return view('post');
//     return "<h1> About us</h1>";
// })->name('about');


//redirect
// Route::get('/about', function () {
//     return "Hello I am about";
// });

// Route::redirect('/post/about', '/about');

//Route group 

Route::prefix('user')->group(function () {
    Route::get('/name', function () {
        return "<h1> Ashutosh Singh </h1> ";
    });
    Route::get('/age', function () {
        return "<h1> 58 </h1> ";
    });
    Route::get('/address', function () {
        return "<h1> Unnao </h1>";
    });
});

// default 404 route
Route::fallback(function () {
    return "<h1> Page NOt found my dear";
});