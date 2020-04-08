<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsPageTest extends TestCase
{
    /**
     * @group pages
     * @group news
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $response = $this->get('/news');

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('meta');
        $response->assertViewHas('page');
        $response->assertViewHas('breadcrumbs');
        
        /* news */
        $response->assertViewHas('news');
        $news = $response['news'];
        $this->assertEquals('Illuminate\Database\Eloquent\Collection',get_class($news));
        $this->assertEquals('App\Models\News',get_class($news->first()));
        $this->assertTrue(method_exists($news->first(), 'getUrl'));

    }
}
