<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $page = \App\Models\Page::first();
        $this->assertTrue(method_exists($page, 'getUrl'));
        $this->assertIsString($page->getUrl());
        $this->assertTrue(method_exists($page, 'getMeta'));
        $this->assertIsArray($page->getMeta());
    }
}
