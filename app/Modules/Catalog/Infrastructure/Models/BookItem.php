<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function narrator()
    {
        return $this->belongsTo(Narrator::class);
    }
}