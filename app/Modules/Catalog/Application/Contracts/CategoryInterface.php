<?php

namespace App\Modules\Catalog\Application\Contracts;

use App\Modules\Catalog\Application\DTO\CategoryDTO;
use App\Modules\Catalog\Application\DTO\ContentDTO;
use Illuminate\Database\Eloquent\Collection;

interface CategoryInterface
{
    public function create(array $data): CategoryDTO;
    public function list(): Collection;
    public function createContent(array $data): ContentDTO;
}