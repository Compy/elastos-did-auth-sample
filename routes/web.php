<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'HomeController@verify')->name('verify');
Route::get('/signature', 'ELAAuthController@generateQRCode');
Route::get('/auth/elastos', 'ELAAuthController@authOrRegister');
Route::get('/auth/elastos/complete', 'ELAAuthController@completeAuth');
Route::get('/checkElaAuth', 'ELAAuthController@checkElaAuth');
Route::get('/register/elastos', 'ELAAuthController@authOrRegister');
Route::get('/register/elastos/complete', 'ELAAuthController@completeRegistration');
