<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $news = \App\Models\News::first();
        $this->assertTrue(method_exists($news, 'getUrl'));
        $this->assertIsString($news->getUrl());
        $this->assertTrue(method_exists($news, 'getMeta'));
        $this->assertIsArray($news->getMeta());
    }
}
