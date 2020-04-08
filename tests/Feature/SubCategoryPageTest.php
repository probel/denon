<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubCategoryPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $category = \App\Models\Category::where('parent_id','>',0)->first();
        $this->assertTrue($category);
        $response = $this->get('/'.$category->parent->slug.'/'.$category->slug);

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        
        $response->assertViewHas('meta');
        $response->assertViewHas('breadcrumbs');
        $response->assertViewHas('category'); 
        $response->assertViewHas('products'); // Товары с пагинацией
        $response->assertViewHas('filters');
        
        $filters = $response['filters'];
        $this->assertIsArray($filters);
        $this->assertArrayHasKey('stoсk', $filters); //Фильтр по наличию
        $this->assertArrayHasKey('sale', $filters); //Фильтр по акции
        $response->assertViewHas('sort');
        
        $sort = $response['sort']; // Сортировка
        $this->assertIsArray($sort);
        $this->assertArrayHasKey('field', $sort);
        $this->assertArrayHasKey('direction', $sort);

        $response->assertViewHas('categories'); // Категории из родительской категории для меню справа

        $response->assertViewHas('values'); 
        $data = $response['values'];
        $this->assertIsArray($data);
        $this->assertArrayHasKey('slogan', $data); //ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...
        $this->assertArrayHasKey('description', $data); //УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ ... */
    }
}
