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

Route::get('/', 'PagesController@ticket');

Route::get('view', 'PagesController@view')->name('view');

Route::post('view', 'TicketController@store');

Route::post('comment/new', 'CommentController@store');

Route::post('comment/update', 'CommentController@update');

Route::post('comment/delete', 'CommentController@delete');