<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'content_categories',
            'content_id',
            'category_id'
        );
    }
}