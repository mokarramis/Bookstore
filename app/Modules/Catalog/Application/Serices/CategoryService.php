<?php

namespace App\Modules\Catalog\Application\Serices;

use App\Modules\Catalog\Application\Contracts\CategoryInterface;
use App\Modules\Catalog\Application\DTO\CategoryDTO;
use App\Modules\Catalog\Application\DTO\ContentDTO;
use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Infrastructure\Models\Content;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CategoryService implements CategoryInterface
{
    public function create(array $data) : CategoryDTO
    {
        $category = DB::transaction(function() use($data){
            $category = Category::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'parent_id' => $data['parent_id'] ?? null,
            ]);

            if (!empty($data['content_id'])) {
                $content = Content::where('id', $data['content_id'])->first();
                $content->categories()->attach($category->id);
            }
        });

        return CategoryDTO::fromModel($category);
    }

    public function list(): Collection
    {
        $category = Category::get();

        return $category;
    }

    public function createContent(array $data): ContentDTO
    {
        $content = Content::create([
            'title' => $data['title'],
        ]);

        return ContentDTO::fromModel($content);
    }
}