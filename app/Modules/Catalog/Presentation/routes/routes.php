<?php

namespace App\Modules\Catalog\Presentation\routes;

use App\Modules\Catalog\Presentation\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->group(function () {
  Route::get('/', [CategoryController::class, 'index']);
  Route::get('/content', [CategoryController::class, 'showContentCategory']);
});
