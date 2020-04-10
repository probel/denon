<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class  DeliveryPageTest extends TestCase
{
    /**
     * @group pages
     * A basic feature test example.
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/delivery');
        echo "-->";

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('page');
        $response->assertViewHas('meta');
        $response->assertViewHas('breadcrumbs');
        $response->assertViewHas('bg_image'); // Фоновая картинка под заголовком
        /* data */
        
        $data = $response['values'];
        
        $this->assertIsArray($data);
        
        $this->assertArrayHasKey('slogan', $data); //ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...
        $this->assertArrayHasKey('description', $data); //УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ .

        $this->assertArrayHasKey('pay_icon', $data); //Путь к иконке
        $this->assertIsString($data['pay_icon']);
        $this->assertArrayHasKey('pay_title', $data);
        $this->assertIsString($data['pay_title']); //Доставка и оплата
        $this->assertArrayHasKey('pay_subtitle', $data);
        $this->assertIsString($data['pay_subtitle']); 
        $this->assertArrayHasKey('pay_text', $data);
        $this->assertIsString($data['pay_text']); //HTML Юридическим лицам ... оптового склада.
        $this->assertArrayHasKey('delivery_title', $data); 
        $this->assertIsString($data['delivery_title']); //Доставка товаров по Москве ..
        $this->assertArrayHasKey('delivery_text', $data); 
        $this->assertIsString($data['delivery_text']); //HTML Магазин... на сайте.

    }
}
