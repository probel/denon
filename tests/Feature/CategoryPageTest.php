<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $category = \App\Models\Category::where('parent_id','<',1)->first();
        $this->assertIsObject($category);

        //echo "[[[[[".$category->slug."]]]]";die();

        
        $response = $this->get('/'.$category->slug);

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('meta');
        $response->assertViewHas('breadcrumbs');
        $response->assertViewHas('category');
        $response->assertViewHas('news');
    }
}
