<?php

namespace App\Modules\Catalog\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catalog\Infrastructure\Models\Content;
use App\Modules\Catalog\Presentation\Resource\Category\CategoryResource;
use App\Modules\Catalog\Presentation\Resource\Category\ContentCategoryResource;


class CategoryController extends Controller
{
    public function index()
    {
        $contentWithCategories = Content::with(['categories.childrenRecursive'])->get();
        
        return success('Category data', CategoryResource::collection($contentWithCategories), 200);
    }

    public function showContentCategory(Content $content)
    {
        $categories = $content->categories()->get();
        
        return success('Content Category', ContentCategoryResource::collection($categories), 200);
    }
    
}