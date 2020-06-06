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
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/mahasiswa', 'MahasiswaController@index');
    Route::POST('/mahasiswa/create', 'MahasiswaController@create');
    Route::get('/mahasiswa/{id_mahasiswa}/edit', 'MahasiswaController@edit');
    Route::post('/mahasiswa/{id_mahasiswa}/update', 'MahasiswaController@update');
    Route::get('/mahasiswa/{id_mahasiswa}/delete', 'MahasiswaController@destroy');
    Route::get('/mahasiswa/export', 'MahasiswaController@export');
    Route::get('/mahasiswa/exportPDF', 'MahasiswaController@exportPDF');
    //Route::get('/', 'UserController@index');
    Route::get('/', function () {
        return view('layouts.master');
    });
});
