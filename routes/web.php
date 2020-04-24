<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/event', 'EventController@index')->name('event');
Route::get('/semblanza', 'SemblanzaController@index')->name('semblanza');
Route::get('/cam', 'CAMController@index')->name('cam');
Auth::routes();
