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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pettycashes', 'App\Http\Controllers\Api\PettycashController@index');
Route::post('pettycashes', 'App\Http\Controllers\Api\PettycashController@store');
Route::put('pettycashes/{pettycash}', 'App\Http\Controllers\Api\PettycashController@update');
Route::delete('pettycashes/{pettycash}', 'App\Http\Controllers\Api\PettycashController@destroy');
