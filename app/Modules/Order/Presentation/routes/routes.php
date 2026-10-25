<?php

namespace App\Modules\Order\Presentation\Routes;

use App\Modules\Order\Presentation\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('user/order')->group(function(){
    Route::post('create', [OrderController::class, 'createOrderFirstStep']);
});
