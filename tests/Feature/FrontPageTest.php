<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $response = $this->get('/');

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('meta');
        /* categories */
        $response->assertViewHas('categories');
        $categories = $response['categories'];
        $this->assertEquals('Illuminate\Database\Eloquent\Collection',get_class($categories));
        $this->assertEquals('App\Models\Category',get_class($categories->first()));
        $this->assertTrue(method_exists($categories->first(), 'getUrl')); // $category->getUrl()
        $this->assertEquals('Illuminate\Database\Eloquent\Collection',get_class($categories->first()->products));
        /* news */
        $response->assertViewHas('news');
        $news = $response['news'];
        $this->assertEquals('Illuminate\Database\Eloquent\Collection',get_class($news));
        $this->assertEquals('App\Models\News',get_class($news->first()));
        $this->assertTrue(method_exists($news->first(), 'getUrl'));
        /* data */
        $data = $response['values'];
        $this->assertIsArray($data);

        $this->assertArrayHasKey('sliders', $data); //Слайдер
        $this->assertIsArray($data['sliders']);
        $this->assertIsArray($data['sliders'][0]);
        $this->assertArrayHasKey('title', $data['sliders'][0]); //ALL IN ONE!*
        $this->assertArrayHasKey('subtitle', $data['sliders'][0]); //НОВЫЙ CEOL
        $this->assertArrayHasKey('description', $data['sliders'][0]); //стильный, мощный, компактный, универсальный
        $this->assertArrayHasKey('url', $data['sliders'][0]); //подробнее
        $this->assertArrayHasKey('help', $data['sliders'][0]); //один за всех


        $this->assertArrayHasKey('slogan', $data); //ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...
        $this->assertArrayHasKey('description', $data); //УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ ...
        
    }
}
