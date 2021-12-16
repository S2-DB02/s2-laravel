<?php

use App\Http\Resources\TicketResource;
use App\Http\Resources\UserResource;
use App\ticket;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/ticket/url/{URL}', 'TicketController@ticketurl');

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

// Route::get('/ticket/url?g={url}', function ($url) {
//     dd($url); // itm:n#_123445

// });
Route::get('/ticket', function(){
    return TicketResource::collection(ticket::all());
});

Route::get('/ticket/{ticket}', 'TicketController@show');
// Route::get('/ticket/{ticket}', function($ticket)
// {
//     dd(ticket::find($ticket));
//     return TicketResource::collection(ticket::find($ticket));
// });

Route::get('/user/{user}', 'GebruikersController@show');
// Route::get('/user', function () {
//     return new UserResource(User::find(1));
// });
Route::get('/leaderboard', 'GebruikersController@getTopTen');

Route::get('/LoggedInUser/{id}', 'GebruikersController@getLoggedInUser');


Route::post('/ticket', 'TicketController@store')->middleware('auth:api');
// Route::post('/user', 'GebruikersController@store');
// Route::post('/user/login', 'Auth/LoginController');
// Auth::routes();

// Route::post('/user', 'GebruikersController@store');

// Route::group(['middleware' => ['cors', 'json.response']], function () {

    // ...

    // public routes
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');

    // ...

// });

