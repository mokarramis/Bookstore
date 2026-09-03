<?php

namespace Database\Seeders;

use App\Modules\Catalog\Infrastructure\Database\Seeders\CategorySeeder;
use App\Modules\Catalog\Infrastructure\Database\Seeders\ContentSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            ContentSeeder::class,
            CategorySeeder::class,
        );
    }
}
