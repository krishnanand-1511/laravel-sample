<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HelloController::class, 'greet']);


Route::post('/savedata', [HelloController::class, 'userInput']);

Route::post('/deletedata', [HelloController::class, 'userDelete']);

Route::post('/updatepassword', [HelloController::class, 'updateUser']);




// Route::get('/', function () {
//     return view('hello');
// });




// Route::get('/user/{name}', function ($name) {
//     return "Hello, $name!";
// });



