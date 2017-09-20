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

//Runs the ticket creation and viewing through authentication midddleware
//to guard from unauthorised access
Route::get('/', 'PagesController@ticket')->middleware('auth');

Route::get('view', 'PagesController@view')->name('view')->middleware('auth');

Route::get('FAQ', 'PagesController@faq');

Route::post('view', 'TicketController@store');

Route::post('comment/new', 'CommentController@store');

Route::post('comment/update', 'CommentController@update');

Route::post('comment/delete', 'CommentController@delete');

Auth::routes();