<?php

namespace App\Modules\Documentation\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Bookstore API',
    description: 'API documentation for Bookstore'
)]
class OpenApiSpec
{
}