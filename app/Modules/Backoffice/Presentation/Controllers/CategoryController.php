<?php

namespace App\Modules\Backoffice\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Backoffice\Presentation\Requests\CategoryRequest;
use App\Modules\Backoffice\Presentation\Resource\CategoryResource;
use App\Modules\Catalog\Application\Contracts\CategoryInterface;
use OpenApi\Attributes as OA;


class CategoryController extends Controller
{

    public function __construct(public CategoryInterface $categoryInterface)
    {
      
    }

    #[OA\Post(
      path: '/category',
      summary: 'Create Category',
      description: 'Create a new category',
      tags: ['Backoffice - Category'],

      requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['title', 'status'],
            properties: [
                new OA\Property(
                    property: 'title',
                    type: 'string',
                    description: 'Category title',
                    example: 'رمان'
                ),
                new OA\Property(
                    property: 'slug',
                    type: 'string',
                    nullable: true,
                    description: 'Category slug',
                    example: 'foreign-story'
                ),
                new OA\Property(
                    property: 'parent_id',
                        type: 'integer',
                        nullable: true,
                        description: 'Parent category ID',
                        example: 1
                    ),
                    new OA\Property(
                        property: 'status',
                        type: 'string',
                        description: 'Category status',
                        example: 'active'
                    ),
                ]
            )
        ),

        responses: [
            new OA\Response(
                response: 201,
                description: 'Category created successfully'
            ),
            new OA\Response(
                response: 401,
                description: 'Unauthorized'
            ),
            new OA\Response(
                response: 422,
                description: 'Validation error'
            ),
        ]
    )]
    public function create(CategoryRequest $request)
    {
        $category = $this->categoryInterface->create($request->all());

        return success('created', $category);
    }

    #[OA\Get(
      path: '/category',
      summary: 'Get Category List',
      description: 'Get List of category',
      tags: ['Backoffice - Category'],

      responses: [
          new OA\Response(
              response: 201,
              description: 'Category list'
          ),
          new OA\Response(
              response: 401,
              description: 'Unauthorized'
          ),
          new OA\Response(
              response: 422,
              description: 'Validation error'
          ),
      ]
    )]
    public function list()
    {
        $category = $this->categoryInterface->list();

        return success('categories list', CategoryResource::collection($category));
    }
}