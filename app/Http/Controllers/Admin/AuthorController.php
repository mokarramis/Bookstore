<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
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
