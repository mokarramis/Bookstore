<?php

use App\Modules\Payment\Presentation\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::prefix('transaction')->group(function(){
    Route::post('create', [TransactionController::class, 'create']);
    Route::get('callback', [TransactionController::class, 'callback']);
});