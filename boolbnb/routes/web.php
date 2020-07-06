<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/layouts/home');
}) ->name('home');

Route::get('/search', function () {
    return view('/layouts/searchResults');
}) ->name('search');
