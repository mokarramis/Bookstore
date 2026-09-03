<?php

namespace Database\Factories;

use App\Models\Model;
use App\Modules\Catalog\Infrastructure\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class CategoryFactory extends Factory
{
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
