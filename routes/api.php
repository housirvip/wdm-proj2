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

Route::get('/equipo', 'EquipoController@get');
Route::post('/equipo', 'EquipoController@post');
Route::put('/equipo', 'EquipoController@put');
Route::delete('/equipo', 'EquipoController@delete');
Route::get('/event', 'EventController@get');
Route::post('/event', 'EventController@post');
Route::put('/event', 'EventController@put');
Route::delete('/event', 'EventController@delete');
Route::get('/project', 'ProjectController@get');
Route::post('/project', 'ProjectController@post');
Route::put('/project', 'ProjectController@put');
Route::delete('/project', 'ProjectController@delete');
Route::get('/video', 'VideoController@get');
Route::post('/video', 'VideoController@post');
Route::put('/video', 'VideoController@put');
Route::delete('/video', 'VideoController@delete');
