<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create_apartment', 'UserController@create')->name('create_apartment');
Route::post('/store_apartment', 'UserController@store')->name('store_apartment');
