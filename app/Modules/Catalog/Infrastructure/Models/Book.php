<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany('category', 'book_categories');
    }
}