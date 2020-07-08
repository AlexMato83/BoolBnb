<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'UiController@index') -> name('welcome');
Route::post('/ui_apartments', 'UiController@show_ui_apartments') -> name('ui_apartments');
Route::post('/ui_filtered_apt', 'UiController@filter_ui_apartments') -> name('ui_filtered_apt');
Route::get('/ui_apartment/{id}', 'UiController@show_ui_apartment') -> name('ui_apartment');
Route::post('/send_message/{id}', 'UiController@send_message_upra') -> name('send_message_upra');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create_apartment', 'UserController@create')->name('create_apartment');
Route::post('/store_apartment', 'UserController@store')->name('store_apartment');
Route::get('/edit_apartment/{id}', 'UserController@edit')->name('edit_apartment');
Route::post('/update_apartment/{id}', 'UserController@update')->name('update_apartment');
Route::get('/user_apartments', 'UserController@show_apartments')->name('user_apartments');
Route::get('/map', 'UserController@prova_tomtom')->name('prova_tomtom');
Route::get('/show_upra_apartment/{id}', 'UserController@show_upra_apartment')->name('show_upra_apartment');
Route::get('/delete_apartment/{id}', 'UserController@delete_apartment')->name('delete_apartment');
Route::get('/new_view/{id}', 'UserController@create_view')->name('create_view');
Route::get('/show_messages', 'UserController@show_messages')->name('show_messages');


//******* Prova rotte per api *******//

Route::get('/welcome_show', 'ApiController@welcome_show')->name('welcome_show');
