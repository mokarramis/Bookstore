<?php

namespace App\Modules\Catalog;

use App\Modules\Catalog\Application\Contracts\BookInterface;
use App\Modules\Catalog\Application\Contracts\CategoryInterface;
use App\Modules\Catalog\Application\Serices\BookService;
use App\Modules\Catalog\Application\Serices\CategoryService;
use Illuminate\Support\ServiceProvider;

class CatalogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CategoryInterface::class,
            CategoryService::class
        );

        $this->app->bind(
            BookInterface::class,
            BookService::class
        );
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