<?php

use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\SubscribedController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('export', [UserController::class, 'exportusers'])->name('exportusers');
Route::post('import', [UserController::class, 'import'])->name('import');
// Route::group(['middleware' => 'auth'], function () {
//     Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
//     Route::post('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
// });