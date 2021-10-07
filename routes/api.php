<?php

use App\Http\Resources\TicketResource;
use App\ticket;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/ticket', function(){
    return TicketResource::collection(ticket::all());
});

Route::get('/ticket/{ticket}', 'TicketController@show');


Route::post('/ticket', 'TicketController@store');
Route::post('/user', 'GebruikersController@store');

    