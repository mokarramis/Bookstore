<?php

namespace App\Modules\Backoffice\Presentation\routes;

use App\Modules\Backoffice\Presentation\Controllers\BookController;
use App\Modules\Backoffice\Presentation\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->prefix('category')->group(function () {
    Route::post('/', [CategoryController::class, 'create']);
    Route::get('/', [CategoryController::class, 'list']);
});

Route::middleware('auth:admin')->prefix('book')->group(function () {
    Route::post('/', [BookController::class, 'create']);
    Route::get('/', [BookController::class, 'list']);
});
