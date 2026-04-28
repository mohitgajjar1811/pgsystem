<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/delete', [ProfileController::class, 'deleteAccount'])->name('profile.delete');
});

Route::get('/loadlogin', function () {
    return view('user.login');
})->name('login');
Route::post('/loadlogin', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Handle payment flow
Route::match(['get', 'post'], '/payment_process', [MainController::class, 'payment_process']);
Route::post('/success', [MainController::class, 'success']);

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/shownews', [AdminController::class, 'shownews']);
    Route::get('/showappointment', [AdminController::class, 'showappointment']);
    Route::get('/showbooking', [AdminController::class, 'showbooking']);
    Route::get('/showcontact', [AdminController::class, 'showcontact']);
    Route::get('/showregistration', [AdminController::class, 'showregistration']);
    Route::get('/showlogin', [AdminController::class, 'showlogin']);
    Route::get('/deleteregistration/{id}', [AdminController::class, 'deleteregistration']);
    
    Route::match(['get', 'post'], '/addteam', [AdminController::class, 'addteam']);
    Route::get('/showteam', [AdminController::class, 'showteam']);
    Route::get('/deleteteam/{id}', [AdminController::class, 'deleteteam']);
    Route::match(['get', 'post'], '/updateteam/{id}', [AdminController::class, 'updateteam']);
    
    Route::match(['get', 'post'], '/addroom', [AdminController::class, 'addroom']);
    Route::get('/showroom', [AdminController::class, 'showroom']);
    Route::match(['get', 'post'], '/updateroom/{id}', [AdminController::class, 'updateroom']);
    Route::get('/deleteroom/{id}', [AdminController::class, 'deleteroom']);
    
    Route::get('/showorder', [AdminController::class, 'showorder']);
    Route::get('/showcheckout', [AdminController::class, 'showcheckout']);
    Route::get('/deletecheckout/{id}', [AdminController::class, 'deletecheckout']);
    Route::get('/deletenews/{id}', [AdminController::class, 'deletenews']);
    Route::get('/deleteappointment/{id}', [AdminController::class, 'deleteappointment']);
    Route::get('/deletebooking/{id}', [AdminController::class, 'deletebooking']);
    Route::post('/delete-multiple-bookings', [AdminController::class, 'deleteMultipleBookings']);
    Route::get('/deletecontact/{id}', [AdminController::class, 'deletecontact']);
    Route::get('/deleteorder/{id}', [AdminController::class, 'deleteorder']);
    
    Route::match(['get', 'post'], '/addtest', [AdminController::class, 'addtest']);
    Route::get('/showtest', [AdminController::class, 'showtest']);
    Route::match(['get', 'post'], '/updatetest/{id}', [AdminController::class, 'updatetest']);
    Route::get('/deletetest/{id}', [AdminController::class, 'deletetest']);

    Route::match(['get', 'post'], '/smtp-settings', [AdminController::class, 'smtpSettings']);
});
