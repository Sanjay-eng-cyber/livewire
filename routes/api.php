<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'App\Http\Controllers\cms\UserAuthController@login');
Route::post('signup', 'App\Http\Controllers\cms\UserAuthController@signUp');

Route::group(["middleware" => "auth:sanctum"], function () {
    Route::get('/test', function () {
        return ['name' => 'sanjay ahirwal', 'email' => 'sanjay@test.com'];
    });

    Route::get('products', 'App\Http\Controllers\cms\ProductsController@index');
    Route::post('add-product', 'App\Http\Controllers\cms\ProductsController@store');
    Route::put('update-product', 'App\Http\Controllers\cms\ProductsController@update');
    Route::delete('delete-product/{id}', 'App\Http\Controllers\cms\ProductsController@deletePro');
    Route::get('search-product/{name}', 'App\Http\Controllers\cms\ProductsController@search');
});

Route::get('login', 'App\Http\Controllers\cms\UserAuthController@login')->name('login');
