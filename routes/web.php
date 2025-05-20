<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('counter', function () {
    return view('counterView');
});

Route::get('search', function () {
    return view('search');
});

Route::get('loader', function () {
    return view('loader');
});

Route::get('products', function () {
    return view('products');
});
