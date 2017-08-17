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

/*Route::get('/', function () {
    return view('welcome');
});*/

/**Pages**/

Route::get('/', 'PagesController@home');

Route::get('submit-ticket','PagesController@form');

Route::get('about', 'PagesController@about');

Route::get('faq', 'PagesController@faq');

/**Submit new ticket**/

Route::post('store', 'SubmitController@store');

/**Its access only**/

Route::get('its', 'ItsController@displayTickets');

Route::get('ticket/{id}', 'ItsController@ticket');

/**Its submit comment/change status**/

Route::post('submit-comment/{id}','ItsController@submitComment');

Route::post('ticket/change-status/', 'ItsController@changeStatus');

/**User ticket search**/

Route::get('search-ticket', 'UserController@userDisplay');

Route::post('search', 'UserController@searchTicket');

/**User view ticket**/

Route::get('userticket/{id}','UserController@viewTicket');

