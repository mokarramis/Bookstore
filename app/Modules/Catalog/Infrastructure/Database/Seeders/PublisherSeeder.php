<?php

namespace App\Modules\Catalog\Infrastructure\Database\Seeders;

use App\Modules\Catalog\Infrastructure\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
          'نشر هیرمند', 'نشر چشمه', 'استودیو 31', 'نشر اوای نور', 'نگاه'
        ];
        
        foreach ($publishers as $publisher) {
            Publisher::create([
              'name' => $publisher,
              'description' => $publisher . 'تست برای توضیحات...'
            ]);
        }
    }
}
