<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
}) ->name('home');

Route::get('/about', function () {
    return view('about');
}) ->name('about');

Route::get('/contacts', function () {
    return view('contacts');
}) ->name('contacts');
