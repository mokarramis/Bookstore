<?php

namespace App\Modules\Backoffice;

use App\Modules\Backoffice\Policies\CategoryPolicy;
use App\Modules\Catalog\Infrastructure\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


class BackofficeServiceProvider extends ServiceProvider
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

        Gate::policy(Category::class, CategoryPolicy::class);
    }
}
