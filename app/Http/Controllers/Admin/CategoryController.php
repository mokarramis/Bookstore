<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // public function createContent(Request $request)
    // {
    //     $content = Content::create([
    //             'title' => $request->title,
    //         ]);
    // }

    // public function create(Request $request)
    // {
    //     DB::transaction(function() use($request){

    //         $category = Category::create([
    //             'title' => $request->category_title,
    //             'slug' => $request->slug,
    //             'status' => $request->status,
    //             'parent_id' => $request->parent_id ?? null
    //         ]);

    //         if (!$request->parent_id) {
    //             $content = Content::where('id', $request->content_id)->first();
    //             $content->categories()->attach($category->id);
    //         }
    //     });

    //     return success('Category Created', [], 200);

    // }
}
