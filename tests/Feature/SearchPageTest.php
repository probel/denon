<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchPageTest extends TestCase
{
    /**
     * @group pages
     * @group search
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $response = $this->get('/search?search=DCD');

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('meta');
        $response->assertViewHas('page');
        $response->assertViewHas('breadcrumbs');

        /* results */
        $response->assertViewHas('search');
        $this->assertIsString($response['search']);

        $response->assertViewHas('results');
    }
}
