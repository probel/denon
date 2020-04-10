<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    /**
     * @group pages
     * @group catalog
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $product = \App\Models\Product::first();

        $this->assertIsObject($product);
        $this->assertIsObject($product->category);
        $this->assertIsObject($product->category->parent);
        
        $response = $this->get('/'.$product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug);

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('meta');
        $response->assertViewHas('breadcrumbs');
        $response->assertViewHas('product');
        
    }
}
