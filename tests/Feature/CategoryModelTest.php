<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $category = \App\Models\Category::first();
        $this->assertTrue(method_exists($category, 'getUrl'));
        $this->assertIsString($category->getUrl());
        $this->assertTrue(method_exists($category, 'products'));
        $this->assertTrue(method_exists($category, 'childs'));
        $this->assertTrue(method_exists($category, 'parent'));
        $this->assertTrue(method_exists($category, 'getMeta'));
        $this->assertIsArray($category->getMeta());
    }
}
