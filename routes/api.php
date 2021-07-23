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

Route::get('password', function(){
    return bcrypt('vira');
});

Route::get('/Berita', 'BeritaController@index')->name('Berita.index')->middleware('auth:api');
Route::get('/Berita/{id}','BeritaController@show');
Route::delete('/Berita/{id}', 'BeritaController@destroy');
Route::post('/Berita', 'BeritaController@store');
Route::patch('/Berita/{id}', 'BeritaController@update');

Route::group(['middleware' => 'api','prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('harus', 'AuthController@harus');


});










