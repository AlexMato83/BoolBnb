<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create_apartment', 'UserController@create')->name('create_apartment');
Route::post('/store_apartment', 'UserController@store')->name('store_apartment');
Route::get('/edit_apartment/{id}', 'UserController@edit')->name('edit_apartment');
Route::post('/update_apartment/{id}', 'UserController@update')->name('update_apartment');
Route::get('/user_apartment', 'UserController@show_apartments')->name('user_apartment');

