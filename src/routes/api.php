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

//Ticket API routes

Route::middleware('cors')->get('tickets', 'TicketController@index');

Route::middleware('cors')->get('tickets/{id}', 'TicketController@show');

Route::middleware('cors')->post('tickets', 'TicketController@insert');

Route::middleware('cors')->post('tickets/{id}', 'TicketController@update');

Route::middleware('cors')->post('tickets/{id}', 'TicketController@delete');

//Staff API routes

Route::middleware('cors')->get('staff', 'StaffController@index');

Route::middleware('cors')->get('staff/{id}', 'StaffController@show');

Route::middleware('cors')->post('staff', 'StaffController@store');


