<?php

namespace App\Modules\Catalog\Application\Serices;

use App\Modules\Catalog\Application\Contracts\CategoryInterface;
use App\Modules\Catalog\Application\DTO\CategoryDTO;
use App\Modules\Catalog\Infrastructure\Models\Category;

class CategoryService implements CategoryInterface
{
    public function create(array $data) : CategoryDTO
    {
        $category = Category::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'parent_id' => $data['parent_id'] ?? null,
        ]);

        return CategoryDTO::fromModel($category);
    }

    public function list(): Category
    {
        $category = Category::get();

        return $category;
    }
}