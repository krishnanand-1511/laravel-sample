<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormController;
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


require __DIR__.'/auth.php';
