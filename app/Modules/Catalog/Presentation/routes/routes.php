<?php

use App\Modules\Catalog\Presentation\Controllers\BookController;
use App\Modules\Catalog\Presentation\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('catalog')->group(function(){
    Route::prefix('category')->group(function () {
      Route::get('/', [CategoryController::class, 'index']);
      Route::get('/content', [CategoryController::class, 'showContentCategory']);
    });

    Route::prefix('search')->group(function () {
      Route::get('/{content}/{category}', [BookController::class, 'list']);
      Route::get('/{content}', [BookController::class, 'showCategories']);
    });
});
