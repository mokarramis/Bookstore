<?php

namespace App\Modules\Authentication\Presentation\routes;

use App\Modules\Authentication\Presentation\Controller\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware(['throttle:5,1'])->group(function(){
  Route::post('send-code', [AuthController::class, 'sendCode']);
  Route::post('login', [AuthController::class, 'login']);
});