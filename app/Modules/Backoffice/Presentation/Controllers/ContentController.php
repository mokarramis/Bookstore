<?php

namespace App\Modules\Backoffice\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catalog\Application\Contracts\CategoryInterface;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function __construct(public CategoryInterface $categoryInterface)
    {}

    public function createContent(Request $request)
    {
        $content = $this->categoryInterface->createContent([
            'title' => $request->title,
        ]);

        return success('content created', [], 200);
    }

    public function create(Request $request)
    {
        $this->categoryInterface->create($request->all());

        return success('Category Created', [], 200);

    }
}