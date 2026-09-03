<?php

namespace App\Modules\Catalog\Infrastructure\Database\Seeders;

use App\Modules\Catalog\Infrastructure\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'کتاب الکترونیکی',
            'کتاب صوتی',
            'مجلات',
            'دروس و دانشگاهی',
            'پادکست',
            'پلاس'
        ];

        foreach ($titles as $title) {
            $content = Content::updateOrCreate([
                'title' => $title,
            ]);
        }
    }
}
