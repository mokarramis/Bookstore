<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use App\Modules\Order\Infrastructure\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Override;

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

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'book_item_order')->withPivot('count');
    }
}