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

//Route::get('/', 'TicketController@index'); old route to get to ticket dashboard even when not logged in

Route::resource('/',  TicketController::class)->middleware(['auth','Developer']);
Route::resource('/ticket',  TicketController::class)->middleware(['auth','Developer']);

Auth::routes(['register' => false]);
Route::resource('/user',  GebruikersController::class)->middleware(['auth','Admin']);
// ->except(['store'])

Route::get('/credChange/{id}', 'GebruikersController@credChange')->name('credChange');
Route::post('/credChange/{id}', 'GebruikersController@credUpdate')->name('credUpdate');



//Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/comment',  CommentController::class);

// Route::post('/comment/{id}', 'CommentController@store');
// Route::post('/comment/Delete/{id}', 'CommentController@destroy');
// Route::post('/comment/Update/{id}', 'CommentController@update');
