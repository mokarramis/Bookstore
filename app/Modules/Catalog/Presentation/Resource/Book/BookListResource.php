<?php

namespace App\Modules\Catalog\Presentation\Resource\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookListResource extends JsonResource
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
            'book_item_id' => $this->id,
            'title' => $this->book->title,
            'authors' => AuthorListResource::collection($this->book->authors),
            'description' => $this->book->description,
            'summary' => $this->book->summary,
            'price' => $this->price,
            'format' => $this->format,
            'narrator' => $this->narrator->name,
            'publisher' => $this->publisher->name,
            'content_type' => $this->content->title,
            //TODO: FIX THIS TO GET IMAGE FROM UPLOAD SERVICE
            'image' => null
        ];
    }
}