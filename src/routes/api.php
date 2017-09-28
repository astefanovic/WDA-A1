<?php

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

Route::get('tickets', 'TicketController@index');

Route::get('tickets/{id}', 'TicketController@show');

Route::post('tickets', 'TicketController@store');

Route::post('tickets/{id}', 'TicketController@update');

Route::post('tickets/{id}', 'TicketController@delete');
