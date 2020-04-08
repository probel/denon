<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SingleNewsPageTest extends TestCase
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
        $news = \App\Model\News::first();
        $response = $this->get('/news/'.$news->slug);

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('meta');
        $response->assertViewHas('breadcrumbs');
        
        /* news */
        $response->assertViewHas('news');
        $news = $response['news'];
        $this->assertEquals('App\Models\News',get_class($news));
        $this->assertTrue(method_exists($news, 'prev')); // предыдущая новость
        $this->assertEquals('App\Models\News',get_class($news->pref()));
        $this->assertTrue(method_exists($news, 'next')); // следующая новость
        $this->assertEquals('App\Models\News',get_class($news->next()));

    }
}
