<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WarrantyPageTest extends TestCase
{
    /**
     * @group pages
     * A basic feature test example.
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/warranty');

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

        $this->assertArrayHasKey('warranty_icon', $data); //Путь к иконке
        $this->assertIsString($data['warranty_icon']);
        $this->assertArrayHasKey('warranty_title', $data);
        $this->assertIsString($data['warranty_title']); //Гарантия
        $this->assertArrayHasKey('warranty_subtitle', $data);
        $this->assertIsString($data['warranty_subtitle']); //Срок и условия гарантии для..
        $this->assertArrayHasKey('warranty_text', $data);
        $this->assertIsString($data['warranty_text']); //HTML Однолетний период ... Гарантийный срок - 12 месяцев
        
        $this->assertArrayHasKey('service_icon', $data); //Путь к иконке
        $this->assertIsString($data['service_icon']);
        $this->assertArrayHasKey('service_title', $data); 
        $this->assertIsString($data['service_title']); //Сервис
        $this->assertArrayHasKey('service_subtitle', $data); 
        $this->assertIsString($data['service_subtitle']); //Список авторизованных...

        $this->assertArrayHasKey('service_addresses', $data); 
        $this->assertIsArray($data['service_addresses']); //Адреса сервисных центров
        $this->assertArrayHasKey('title', $data['service_addresses'][0]); // Москва
        $this->assertArrayHasKey('text', $data['service_addresses'][0]); // ООО Северный 
        
    }
}
