<?php

namespace App\Modules\Authentication;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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