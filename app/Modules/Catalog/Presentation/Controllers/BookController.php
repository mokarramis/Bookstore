<?php

namespace App\Modules\Catalog\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catalog\Infrastructure\Models\BookItem;
use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Presentation\Resource\Book\BookListResource;

class BookController extends Controller
{
    public function list(int $content_id, int $category_id)
    {
        $bookItems = BookItem::with([
                'book',
                'publisher',
                'narrator',
                'book.authors',
                'content'
            ])
            ->where('content_id', $content_id)
            ->whereHas('book.categories', function ($query) use ($category_id) {
                $query->where('categories.id', $category_id);
            })
            ->paginate(20);

        return success('books list', 
            [
                'items' => BookListResource::collection($bookItems),
                'pagination' => pagination($bookItems)
            ],    
        );
    }

    public function showCategories(int $content)
    {
        // content->categories;
        $categories = Category::whereHas('contents', function($q) use ($content){
            $q->where('contents.id', $content);
        })->get();

        return success('categories list', $categories);
    }
}
