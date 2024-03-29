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

Route::group(['middleware' => 'cors'], function () {
    Route::get('tickets', 'AdminController@index');
    Route::get('tickets/{id}', 'AdminController@show');
    Route::get('tickets/comments/{id}', 'AdminController@getComments');
    Route::post('tickets/comments/{id}', 'AdminController@editComments');
    Route::put('tickets/status/{id}', 'AdminController@changeStatus');
});