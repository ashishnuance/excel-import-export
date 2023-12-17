<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChattingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(ChattingController::class)->middleware('auth')->group(function () {

    Route::get('/messages', 'index')->name('messages');
    Route::post('/send-message', 'send')->name('send-message');
});