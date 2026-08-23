<?php

namespace App\Modules\Catalog\Application\DTO;

use App\Modules\Catalog\Infrastructure\Models\Content;

class ContentDTO 
{
    public function __construct(public int $id, public string $title)
    {
      
    }

    public static function fromModel(Content $content): self
    {
        return new self($content->id, $content->title);
    }
}