<?php

namespace App\Modules\Catalog\Application\Serices;

use App\Modules\Catalog\Application\Contracts\BookInterface;
use App\Modules\Catalog\Application\DTO\BookDTO;
use App\Modules\Catalog\Infrastructure\Models\Book;
use App\Modules\Catalog\Infrastructure\Models\BookItem;
use Illuminate\Support\Facades\DB;

class BookService implements BookInterface
{
    public function createBook(array $data): BookDTO
    {
        $book = DB::transaction(function() use ($data){
            $book = Book::create([
              'title' => $data['title'],
              'description' => $data['description'],
              'summary' => $data['summary']
            ]);

            $book->categories()->attach($data['category_id']);

            $book_items = BookItem::create([
              'price' => $data['price'],
              'format' => $data['format'],
              'pages' => $data['pages'],
              'duration' => $data['duration'],
              'file_size' => $data['file_size'],
              'publisher_id' => $data['publisher_id'],
              'book_id' => $data['book_id']
            ]);

            return $book;
        });

        return BookDTO::fromModel($book);
    }
}