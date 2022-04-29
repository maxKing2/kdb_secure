<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'authapitoken'], function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('get-account-balance',"API\GetUserInfoAPIController@get_user_balance");
    Route::get('get-account-status',"API\GetUserInfoAPIController@get_user_status");

});
   
