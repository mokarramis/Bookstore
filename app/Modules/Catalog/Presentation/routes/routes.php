<?php

namespace App\Modules\Catalog\Presentation\routes;

use App\Modules\Catalog\Presentation\Controllers\AuthorController;
use App\Modules\Catalog\Presentation\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->group(function () {
  Route::post('create', [CategoryController::class, 'create']);
  Route::get('{category}/children', [CategoryController::class, 'children']);
});

Route::prefix('author')->group(function () {
  Route::post('create', [AuthorController::class, 'create']);
});