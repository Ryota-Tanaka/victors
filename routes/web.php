<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/cms', 'cms\TopController@index')->middleware('auth');
Route::get('/cms/player', 'cms\PlayerInfoController@index')->middleware('auth');

Route::group(['middleware' => ['web']], function () {
    Route::post('/cms/player/confirm', 'cms\PlayerInfoController@create');
    Route::get('/cms/player/list', 'cms\PlayerInfoController@getPlayerList');
});
