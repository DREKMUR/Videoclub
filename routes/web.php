<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/show/{id}', [CatalogController::class, 'show'])->name('catalog.show');
Route::post('/catalog/create', [CatalogController::class, 'postCreate'])->name('catalog.create');
Route::get('/catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');
Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit'])->name('catalog.edit.put');
Route::get('/catalog/table', [CatalogController::class, 'table'])->name('catalog.table');

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return view('auth.logout');
});
