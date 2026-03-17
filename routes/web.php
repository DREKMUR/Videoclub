<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

require __DIR__ . '/auth.php';


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::get('/', [HomeController::class, 'index']);
Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('catalog');
Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow'])->name('catalog.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->name('catalog.create');
    Route::post('/catalog/create', [CatalogController::class, 'postCreate']);
    Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit']);
    Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit'])->name('catalog.edit.put');

    Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent']);
    Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn']);
    Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie']);
});
