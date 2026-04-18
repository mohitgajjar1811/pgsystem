<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// ONE-TIME IMAGE FIX: visit /fix-storage once to copy images
Route::get('/fix-storage', function () {
    $src  = storage_path('app/public');
    $dest = public_path('storage');

    // 1. Aggressively try to move/delete any existing file/link named 'storage' in public
    if (file_exists($dest) || is_link($dest)) {
        $backup = $dest . '_old_' . time();
        @rename($dest, $backup); // Try renaming if delete fails
        if (file_exists($dest) || is_link($dest)) {
            @unlink($dest);
            @rmdir($dest);
        }
    }

    // 2. Fallback: If 'storage' is still blocked, we'll direct the app to use 'project_images'
    // but first let's try one more time to create it
    if (!is_dir($dest)) {
        if (!@mkdir($dest, 0755, true)) {
            // If still blocked, use a different name totally
            $dest = public_path('img_uploads');
            if (!is_dir($dest)) @mkdir($dest, 0755, true);
        }
    }

    $folders = ['image', 'image1', 'image2'];
    $copied  = 0;

    foreach ($folders as $folder) {
        $srcFolder  = $src . DIRECTORY_SEPARATOR . $folder;
        $destFolder = $dest . DIRECTORY_SEPARATOR . $folder;

        if (!is_dir($srcFolder)) continue;
        if (!is_dir($destFolder)) @mkdir($destFolder, 0755, true);

        foreach (glob($srcFolder . DIRECTORY_SEPARATOR . '*') as $file) {
            if (!is_file($file)) continue;
            $filename = basename($file);
            if (@copy($file, $destFolder . DIRECTORY_SEPARATOR . $filename)) {
                $copied++;
            }
        }
    }

    $usingPath = basename($dest);
    return "<div style='font-family:sans-serif;padding:20px;background:#f0f9ff;border:1px solid #0ea5e9;border-radius:8px;'>
                <h2 style='color:#0369a1;margin-top:0;'>✅ Storage Sync Complete</h2>
                <p>Copied <b>{$copied}</b> images to <b>public/{$usingPath}</b>.</p>
                <p style='color:#64748b;'>If images still don't show, I will update the view paths to use '{$usingPath}'.</p>
                <br>
                <a href='/admin/showroom' style='display:inline-block;background:#0ea5e9;color:white;padding:10px 20px;border-radius:6px;text-decoration:none;font-weight:bold;'>→ Check Images Now</a>
            </div>";
});

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

Route::prefix('admin')->group(function () {
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
    Route::get('/deletecontact/{id}', [AdminController::class, 'deletecontact']);
    Route::get('/deleteorder/{id}', [AdminController::class, 'deleteorder']);
    
    Route::match(['get', 'post'], '/addtest', [AdminController::class, 'addtest']);
    Route::get('/showtest', [AdminController::class, 'showtest']);
    Route::match(['get', 'post'], '/updatetest/{id}', [AdminController::class, 'updatetest']);
    Route::get('/deletetest/{id}', [AdminController::class, 'deletetest']);
});
