<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    return view('logout');
});

Route::prefix('/catalog')->group(function () {
    Route::get('/', function () {
        return view('catalog');
    });

    Route::get('/show/{id}', function () {
        return view('show');
    });

    Route::get('/create', function () {
        return view('create');
    });

    Route::get('/edit/{id}', function () {
        return view('edit');
    });
});

