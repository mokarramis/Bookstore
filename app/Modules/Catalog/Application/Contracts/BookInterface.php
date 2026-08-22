<?php

namespace App\Modules\Catalog\Application\Contracts;

use App\Modules\Catalog\Application\DTO\BookDTO;
use App\Modules\Catalog\Infrastructure\Models\Book;

interface BookInterface 
{
    public function createBook(array $data): BookDTO;
}