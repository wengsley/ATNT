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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/basic/api_device_call', 'Api\BasicController@ApiDeviceCall')->name('api.basic.api_device_call');
Route::post('/basic/api_food_result', 'Api\BasicController@ApiFoodResult')->name('api.basic.api_food_result');
