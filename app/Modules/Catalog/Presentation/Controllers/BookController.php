<?php

namespace App\Modules\Catalog\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catalog\Infrastructure\Models\Book;
use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Infrastructure\Models\Content;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list(Content $content, Category $category)
    {
        $books = Book::whereHas('bookItems', function($q) use($content){
            $q->where('content_id', $content->id);
        })->whereHas('categories', function ($query) use($category){
            $query->where('categories.id', $category->id);
        })->get();
        

        return success('books list', $books);
    }

    public function showCategories(Content $content)
    {
        $categories = Category::whereHas('contents', function($q) use ($content){
            $q->where('contents.id', $content->id);
        });

        return success('categories list', $categories);
    }
}