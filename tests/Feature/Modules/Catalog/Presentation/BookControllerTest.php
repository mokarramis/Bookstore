<?php

namespace Tests\Feature\Modules\Catalog\Presentation;

use Tests\TestCase;

class BookControllerTest extends TestCase
{
    public function test_book_list()
    {
        $resp = $this->get('catalog/search/1/2');
        $resp->assertStatus(200);
       
    }
}
