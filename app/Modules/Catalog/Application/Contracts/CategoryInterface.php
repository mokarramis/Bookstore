<?php

namespace App\Modules\Catalog\Application\Contracts;

use App\Modules\Catalog\Application\DTO\CategoryDTO;
use App\Modules\Catalog\Application\DTO\ContentDTO;
use App\Modules\Catalog\Infrastructure\Models\Category;

interface CategoryInterface
{
    public function create(array $data): CategoryDTO;
    public function list(): Category;
    public function createContent(array $data): ContentDTO;
}