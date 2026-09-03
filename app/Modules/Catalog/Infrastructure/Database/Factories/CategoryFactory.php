<?php

namespace App\Modules\Catalog\Infrastructure\Database\Factories;

use App\Modules\Catalog\Infrastructure\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{

    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'parent_id' => null,
            'slug' => fake()->slug(),
            'status' => fake()->boolean(),
        ];
    }

    public function childOf(Category $parent): static
    {
        return $this->state(fn() => [
            'parent_id' => $parent->id
        ]);
    }
    
}
