<?php

namespace Tests\Unit\Modules\Catalog\DTO;

use App\Modules\Catalog\Application\DTO\BookDTO;
use PHPUnit\Framework\TestCase;
 
class BookDTOTest extends TestCase
{
    public function test_book_dto_returns_object()
    {
        $book = new BookDTO(54, 'Data Intensive', 'a test book', null);

        $this->assertInstanceOf(BookDTO::class, $book);

    }

}
