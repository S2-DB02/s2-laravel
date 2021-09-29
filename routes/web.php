<?php

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

// use App\Http\Controllers\TicketController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
// Route::get('/sanderdashboard', [App\Http\Controllers\TestController::class, 'index'])->name('test');

Route::resource('/ticket',  TicketController::class);
