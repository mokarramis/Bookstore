<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use App\Modules\Catalog\Infrastructure\Database\Factories\ContentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return ContentFactory::new();
    }

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