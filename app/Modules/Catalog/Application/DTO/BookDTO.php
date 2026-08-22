<?php

namespace App\Modules\Catalog\Application\DTO;

use App\Modules\Catalog\Infrastructure\Models\Book;

class BookDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $description,
        public readonly ?string $summary,
    ) {}

    public static function fromModel(Book $book): self
    {
        return new self(
            $book->id,
            $book->title,
            $book->description,
            $book->summary,
        );
    }
}