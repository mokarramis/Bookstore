<?php

namespace App\Modules\Catalog\Presentation\Resource\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->book->id,
            'name' => $this->name,
            'description' => $this->description,
            'about' => $this->about,
        ];
    }
}