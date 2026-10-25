<?php

namespace App\Modules\Catalog\Infrastructure\Models;

use App\Modules\Catalog\Infrastructure\Database\Factories\PublisherFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Publisher extends Model
{
    use HasFactory;

    public function newFactory()
    {
        return PublisherFactory::new();
    }

    protected $guarded = ['id'];
    
}