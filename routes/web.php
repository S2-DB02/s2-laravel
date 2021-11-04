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

// Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
// Route::get('/sanderdashboard', [App\Http\Controllers\TestController::class, 'index'])->name('test');

Route::get('/', 'TicketController@index');

Route::resource('/ticket',  TicketController::class);

Auth::routes();
Route::resource('/user',  GebruikersController::class)->middleware(['auth','Admin']);
// ->except(['store'])

Route::get('/home', 'HomeController@index')->name('home');


