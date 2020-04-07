<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $product = \App\Models\Product::first();
        $this->assertTrue(method_exists($product, 'getUrl'));
        $this->assertIsString($product->getUrl());
        $this->assertTrue(method_exists($product, 'category'));
        $this->assertTrue(method_exists($product, 'getMeta'));
        $this->assertIsArray($product->getMeta());
    }
}
