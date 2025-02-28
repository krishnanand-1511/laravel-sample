<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Display the contact form (GET request)
Route::get('/contact', [MailController::class, 'showForm'])->name('contact.form');

// Handle form submission (POST request)
Route::post('/contact', [MailController::class, 'sendMail'])->name('submit.mail');


Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', [FileUploadController::class, 'uploadFile'])->name('file.upload');

Route::get('/form', function () {
    return view('form');
});

Route::post('/form', [FormController::class, 'submitForm']);

Route::get('/set-cookie', function () {
    // Setting a cookie that expires in 1 hour
    Cookie::queue('user_name', 'Ajay', 5); // 2 minutes

    return response('Cookie has been set');
});


Route::get('/get-cookie', function () {
    $userName = Cookie::get('user_name'); // Retrieve cookie value

    return response('User name is: ' . $userName);
});


Route::get('/delete-cookie', function () {
    Cookie::queue(Cookie::forget('user_name'));

    return response('Cookie has been deleted');
});

Route::get('/ajax', [HelloController::class, 'ajax']);
Route::get('/jsajax', [HelloController::class, 'jsajax']);
Route::post('/ajaxPost', [HelloController::class, 'ajaxPost']);
Route::get('/gethint', [HelloController::class, 'gethint']);


require __DIR__.'/auth.php';
