<?php

namespace App\Modules\Catalog\Infrastructure\Database\Factories;

use App\Modules\Catalog\Infrastructure\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherFactory extends Factory
{
    protected $model = Publisher::class;

    public function definition(): array
    {
        return [
            'name' => fake()->title(),
            'description' => fake()->text(),
        ];
    }
}