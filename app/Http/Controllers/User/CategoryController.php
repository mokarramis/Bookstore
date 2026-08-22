<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Category\ContentCategoryResource;
use App\Http\Resources\User\CategoryResource;
use App\Models\Category;
use App\Models\Content;
use App\Models\ContentCategory;
use Illuminate\Http\Request;

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
