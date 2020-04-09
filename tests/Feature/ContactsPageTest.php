<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class  ContactsPageTest extends TestCase
{
    /**
     * @group pages
     * A basic feature test example.
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/contacts');

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

        $this->assertArrayHasKey('contacts_icon', $data); //Путь к иконке
        $this->assertIsString($data['contacts_icon']);
        $this->assertArrayHasKey('contacts_title', $data);
        $this->assertIsString($data['contacts_title']); //Контактная информация
        $this->assertArrayHasKey('contacts_subtitle', $data);
        $this->assertIsString($data['contacts_subtitle']); //Интернет магазин ... одна поставка).
        $this->assertArrayHasKey('contacts_text', $data);
        $this->assertIsString($data['contacts_text']); //HTML 
        $this->assertArrayHasKey('show_title', $data); 
        $this->assertIsString($data['show_title']); // Шоу рум denon ..
        $this->assertArrayHasKey('show_subtitle', $data); 
        $this->assertIsString($data['show_subtitle']); //
        $this->assertArrayHasKey('show_text', $data); 
        $this->assertIsString($data['show_text']); //HTML Оборудование ... ЕЖЕДНЕВНО.
        $this->assertArrayHasKey('legal_text', $data); 
        $this->assertIsString($data['legal_text']); //HTML Информация о магазине ... Буйневич

    }
}
