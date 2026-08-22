<?php

namespace App\Modules\Backoffice\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catalog\Application\Contracts\BookInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(public BookInterface $bookInterface)
    {
      
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $book = $this->bookInterface->createBook($data);

        return success('Book Created', $book);
    }
}