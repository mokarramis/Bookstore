<?php

namespace App\Modules\Catalog\Presentation\Controllers;

use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Infrastructure\Models\Content;
use App\Modules\Catalog\Presentation\Resource\Category\CategoryResource as CategoryCategoryResource;
use App\Modules\Catalog\Presentation\Resource\Category\ContentCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController
{
    public function index()
    {
        $contentWithCategories = Content::with(['categories.childrenRecursive'])->get();
        
        return success('Category data', CategoryCategoryResource::collection($contentWithCategories), 200);
    }

    public function showContentCategory(Content $content)
    {
        $categories = $content->categories()->get();
        
        return success('Content Category', ContentCategoryResource::collection($categories), 200);
    }

    public function createContent(Request $request)
    {
        $content = Content::create([
                'title' => $request->title,
            ]);
    }

    public function create(Request $request)
    {
        DB::transaction(function() use($request){

            $category = Category::create([
                'title' => $request->category_title,
                'slug' => $request->slug,
                'status' => $request->status,
                'parent_id' => $request->parent_id ?? null
            ]);

            if (!$request->parent_id) {
                $content = Content::where('id', $request->content_id)->first();
                $content->categories()->attach($category->id);
            }
        });

        return success('Category Created', [], 200);

    }
    
}