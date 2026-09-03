<?php

namespace Tests\Feature\Content\Category;

use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Infrastructure\Models\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Override;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    
    #[Override]
    public function setUp(): void
    {
        parent::setUp();
        $contents = Content::factory()->count(3)->create();
        
        $parents = Category::factory()->count(3)->create();
        $children = Category::factory()->count(7)->create([
            'parent_id' => fn () => $parents->random()->id,
        ]);

        $contents->each(function ($content) use ($parents) {
            $content->categories()->attach(
                $parents->random(rand(2, 3))->pluck('id')
            );
        });
    }

    public function test_show_content_with_categories()
    {
        $this->getJson('/catalog/category/content')
            ->assertJsonStructure([
                'success', 
                'message', 
                'data' => []
            ])
            ->assertStatus(200);
    }

    public function show_content_with_categories()
    {
        $this->getJson('/catalog/categories')
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'content',
                        'category'
                    ]
                ]
            ]);
    }
}
