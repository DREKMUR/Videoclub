<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/show/{id}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::get('/catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');

Route::get('login', function () {
    return view('auth.login');
});

Route::get('login', function () {
    return view('auth.logout');
});

