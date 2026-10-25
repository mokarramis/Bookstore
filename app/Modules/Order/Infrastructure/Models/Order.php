<?php

namespace App\Modules\Order\Infrastructure\Models;

use App\Modules\Catalog\Infrastructure\Models\BookItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function items()
    {
        return $this->belongsToMany(BookItem::class, 'book_item_order');
    }
}
