<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


Route::post('/register', [UserController::class, 'register'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [UserController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    });
});

