<?php

namespace App\Modules\Catalog\Infrastructure\Database\Seeders;

use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Infrastructure\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'کتاب الکترونیکی' => [
                'داستان و رمان خارجی' => [
                    'رمان',
                    'درام',
                    'فانتزی',
                    'عاشقانه',
                    'جنایی و پلیسی',
                    'داستان کوتاه خارجی',
                    'طنز',
                ],

                'داستان و رمان فارسی' => [
                    'رمان',
                    'درام',
                    'فانتزی',
                    'عاشقانه',
                    'جنایی و پلیسی',
                    'داستان کوتاه فارسی',
                    'طنز',
                ],

                'روانشناسی' => [
                    'توسعه فردی',
                    'موفقیت',
                    'ازدواج',
                    'روابط اجتماعی',
                ],
            ],

            'کتاب صوتی' => [
                'داستان و رمان خارجی' => [
                    'رمان',
                    'درام',
                    'فانتزی',
                    'عاشقانه',
                    'جنایی و پلیسی',
                ],

                'روانشناسی' => [
                    'توسعه فردی',
                    'موفقیت',
                    'روابط اجتماعی',
                ],
            ],
        ];

        foreach ($data as $contentTitle => $parentCategories) {
            // dd($data);

            $content = Content::where('title', $contentTitle)->firstOrFail();

            foreach ($parentCategories as $parentTitle => $children) {

                $parent = Category::updateOrCreate(
                    [
                        'title' => $parentTitle,
                        'parent_id' => null,
                    ],
                    [
                        'slug' => Str::slug($parentTitle),
                    ]
                );

                $content->categories()->syncWithoutDetaching($parent->id);

                foreach ($children as $childTitle) {

                    $category = Category::updateOrCreate(
                        [
                            'title' => $childTitle,
                            'parent_id' => $parent->id,
                        ],
                        [
                            'slug' => Str::slug($childTitle),
                        ]
                    );

                    // $content->categories()->syncWithoutDetaching($category->id);
                }
            }
        }


    }
}
