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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
    Route::post('/store', 'StudentController@store')->name('store');
});

Route::group(['prefix' => 'potentials', 'as' => 'potentials.'], function () {
    Route::post('/store', 'PotentialController@store')->name('store');
});
