<?php

namespace App\Modules\Payment;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Presentation/routes/routes.php'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/Infrastructure/Database/Migrations'
        );
    }
}