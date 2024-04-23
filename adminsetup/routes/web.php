<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/user', [AdminController::class, 'alluser'])->name('alluser');
Route::post('/createuser', [AdminController::class, 'createuser'])->name('createuser');
Route::get('/edit/{id}', [AdminController::class, 'getuser'])->name('getuser');
Route::put('/edit', [AdminController::class, 'edituser'])->name('edituser');
Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');

// Address routes
Route::get('/address', [AdminController::class, 'address'])->name('address');
Route::post('/addcountry', [AdminController::class, 'addcountry'])->name('addcountry');
Route::get('/state', [AdminController::class, 'state'])->name('state');
Route::get('/area/{id?}', [AdminController::class, 'area'])->name('area');
Route::post('/addstate', [AdminController::class, 'addstate'])->name('addstate');
Route::get('/district/{id?}', [AdminController::class, 'district'])->name('district');
Route::post('/adddistrict', [AdminController::class, 'adddistrict'])->name('adddistrict');
Route::post('/addarea', [AdminController::class, 'addarea'])->name('addarea');
Route::get('/country', [AdminController::class, 'country'])->name('country');

// Address Edit and delete
Route::get('/country/{id}', [AddressController::class, 'countryeditpage'])->name('countryedit');
Route::put('/editcountry', [AddressController::class, 'editcountry'])->name('editcountry');
Route::post('/countrydelete/{id}', [AddressController::class, 'countrydelete'])->name('countrydelete');
// State
Route::get('/stateeditpage/{id}', [AddressController::class, 'stateeditpage'])->name('stateeditpage');
Route::put('/editstate', [AddressController::class, 'editstate'])->name('editstate');
Route::post('/statedelete/{id}', [AddressController::class, 'statedelete'])->name('statedelete');

// district
Route::post('/districtdelete/{id}', [AddressController::class, 'districtdelete'])->name('districtdelete');
Route::get('/districteditpage/{id}', [AddressController::class, 'districteditpage'])->name('districteditpage');
Route::put('/editdistrict', [AddressController::class, 'editdistrict'])->name('editdistrict');
// Area
Route::post('/areadelete/{id}', [AddressController::class, 'areadelete'])->name('areadelete');
Route::get('/areaeditpage/{id}', [AddressController::class, 'areaeditpage'])->name('areaeditpage');
Route::put('/editarea', [AddressController::class, 'editarea'])->name('editarea');


// Add Categories
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/addcategory', [CategoryController::class, 'addcategory'])->name('addcategory');
Route::post('/addsbcategory', [CategoryController::class, 'addsbcategory'])->name('addsbcategory');
Route::get('/sbcategory', [CategoryController::class, 'sbcategory'])->name('sbcategory');


// Categories Edit delete
Route::post('/catdelete/{id}', [CategoryController::class, 'catdelete'])->name('catdelete');
Route::post('/sbcatdelete/{id}', [CategoryController::class, 'sbcatdelete'])->name('sbcatdelete');
Route::any('/editcat/{id?}', [CategoryController::class, 'editcat'])->name('editcat');
Route::any('/editsbcat/{id?}', [CategoryController::class, 'editsbcat'])->name('editsbcat');

// Admin Login
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::post('/loginadmin', [AdminController::class, 'loginadmin'])->name('loginadmin');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::any('/addproducts/{id?}', [ProductController::class, 'addproducts'])->name('addproducts');
// Slider
Route::any('/slider', [AdminController::class, 'slider'])->name('slider');

// User Side
Route::get('', [UserController::class, 'index'])->name('index');
Route::any('/userlogin', [UserController::class, 'userlogin'])->name('userlogin');
Route::any('/userlogout', [UserController::class, 'userlogout'])->name('userlogout');
Route::any('/profiles', [UserController::class, 'userprofile'])->name('userprofile');
Route::any('/product/{id}', [UserController::class, 'product'])->name('product');
Route::any('/updateaddress/{id?}', [UserController::class, 'updateaddress'])->name('updateaddress');
// User Cart Increment Decrement
Route::get('/increment/{id}', [UserCartController::class, 'incrementcartitem'])->name('incrementcartitem');
Route::get('/decrement/{id}', [UserCartController::class, 'decrement'])->name('decrement');

// cart route
Route::any('/addtocartitem/{id}', [UserCartController::class, 'addtocartitem'])->name('addtocartitem');
Route::any('/removecartitem/{id}', [UserCartController::class, 'removecartitem'])->name('removecartitem');

// User Address
Route::any('/deleteuseraddress/{id?}', [UserController::class, 'deleteuseraddress'])->name('deleteuseraddress');

Route::get('/adduser', function () {
    return view('adduser');
})->name('adduser');
