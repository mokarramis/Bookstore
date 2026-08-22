<?php

namespace App\Modules\Catalog\Application\DTO;

use App\Modules\Catalog\Infrastructure\Models\Category;

class CategoryDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $slug,
        public readonly ?int $parentId,
        public readonly string $status,
    ) {}

    public static function fromModel(Category $category): self
    {
        return new self(
            $category->id,
            $category->title,
            $category->slug,
            $category->parent_id,
            $category->status,
        );
    }
}