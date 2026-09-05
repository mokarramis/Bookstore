<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use App\Modules\Catalog\Infrastructure\Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return BookFactory::new();
    }

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }

    public function bookItems()
    {
        return $this->hasMany(BookItem::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }
}