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

Route::post('/status', [
	'uses' => 'RESTAPIController@add',
	'middleware' => [],
]);

Route::get('/status', [
	'uses' => 'RESTAPIController@search',
	'middleware' => [],
]);

Route::delete('/status/{id}', [
	'uses' => 'RESTAPIController@remove',
	'middleware' => [],
])->where('id', '[0-9]+');

Route::get('/status/{id}', [
  'uses' => 'RESTAPIController@get',
  'middleware' => [],
])->where('id', '[0-9]+');

