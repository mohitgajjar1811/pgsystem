<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

Route::get('/', [MainController::class, 'loadindex'])->name('index');
Route::get('/loadabout', [MainController::class, 'loadabout']);
Route::match(['get', 'post'], '/loadbooking/{title}/{price}', [MainController::class, 'loadbooking']);
Route::match(['get', 'post'], '/loadcontact', [MainController::class, 'loadcontact']);
Route::match(['get', 'post'], '/checkout/{price}', [MainController::class, 'checkout']);
Route::get('/loadroom', [MainController::class, 'loadroom']);
Route::get('/loadservice', [MainController::class, 'loadservice']);
Route::get('/loadteam', [MainController::class, 'loadteam']);
Route::get('/loadtestimonial', [MainController::class, 'loadtestimonial']);
Route::get('/showcontact', [MainController::class, 'showcontact']);
Route::match(['get', 'post'], '/loadragistration', [MainController::class, 'loadragistration']);
Route::match(['get', 'post'], '/loadappointment', [MainController::class, 'loadappointment']);
Route::get('/showappointment', [MainController::class, 'showappointment']);
Route::post('/News', [MainController::class, 'News']);

Route::get('/loadlogin', function () {
    return view('user.login');
})->name('login');
Route::post('/loadlogin', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Handle payment flow
Route::match(['get', 'post'], '/payment_process', [MainController::class, 'payment_process']);
Route::post('/success', [MainController::class, 'success']);
