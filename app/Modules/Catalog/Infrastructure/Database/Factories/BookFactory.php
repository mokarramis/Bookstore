<?php

namespace App\Modules\Catalog\Infrastructure\Database\Factories;

use App\Modules\Catalog\Infrastructure\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->text(),
            'summary'=> fake()->text(),
        ];
    }
}