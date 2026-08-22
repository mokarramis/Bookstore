<?php

namespace App\Modules\Catalog\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Author\AuthorListResource;
use App\Modules\Catalog\Infrastructure\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function list()
    {
        $authors = Author::paginate(10);

        return success('Authors List', AuthorListResource::collection($authors), 200);
    }

    public function create(Request $request)
    {
        $author = Author::create([
            'name' => $request->name,
            'description' => $request->description,
            'about' => $request->about
        ]);

        return success('Author Created', [], 200);
    }
}
