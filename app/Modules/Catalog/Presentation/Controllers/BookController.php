<?php

namespace App\Modules\Catalog\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catalog\Infrastructure\Models\BookItem;
use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Infrastructure\Models\Content;
use App\Modules\Catalog\Presentation\Resource\Book\BookListResource;

class BookController extends Controller
{
    public function list(Content $content, Category $category)
    {
        $bookItems = BookItem::with([
                'book',
                'publisher',
                'narrator',
                'book.authors',
                'content'
            ])
            ->where('content_id', $content->id)
            ->whereHas('book.categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            })
            ->get();

        return success('books list', BookListResource::collection($bookItems));
    }

    public function showCategories(Content $content)
    {
        $categories = Category::whereHas('contents', function($q) use ($content){
            $q->where('contents.id', $content->id);
        });

        return success('categories list', $categories);
    }
}
