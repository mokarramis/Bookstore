<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use App\Modules\Catalog\Infrastructure\Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function parent()
    {
        $this->belongsTo(Category::class, 'parent_id');
    }
    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_categories');
    }
}