<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'UiController@index') -> name('welcome');
Route::post('/ui_apartments', 'UiController@show_ui_apartments') -> name('ui_apartments');
Route::get('/ui_apartment/{id}', 'UiController@show_ui_apartment') -> name('ui_apartment');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create_apartment', 'UserController@create')->name('create_apartment');
Route::post('/store_apartment', 'UserController@store')->name('store_apartment');
Route::get('/edit_apartment/{id}', 'UserController@edit')->name('edit_apartment');
Route::post('/update_apartment/{id}', 'UserController@update')->name('update_apartment');
Route::get('/user_apartment', 'UserController@show_apartments')->name('user_apartment');
Route::get('/map', 'UserController@prova_tomtom')->name('prova_tomtom');
Route::get('/show_upra_apartment/{id}', 'UserController@show_upra_apartment')->name('show_upra_apartment');
Route::get('/delete_apartment/{id}', 'UserController@delete_apartment')->name('delete_apartment');



//******* Prova rotte per api *******//

Route::get('/welcome_show', 'ApiController@welcome_show')->name('welcome_show');
