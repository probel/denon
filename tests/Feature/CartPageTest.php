<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class  CartPageTest extends TestCase
{
    /**
     * @group pages
     * @group cart
     * A basic feature test example.
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/cart');

        /* response */
        $response->assertStatus(200);
        $response->assertHeader('etag');
        $response->assertViewHas('page');
        $response->assertViewHas('meta');
        $response->assertViewHas('breadcrumbs');

        $response->assertViewHas('cart');

        /* data */
        $data = $response['values'];
        $this->assertIsArray($data);

        $this->assertArrayHasKey('delivery_icon', $data); 
        $this->assertIsString($data['delivery_icon']); //Доставка и оплата ..
        $this->assertArrayHasKey('delivery_title', $data); 
        $this->assertIsString($data['delivery_title']); //HTML Юридическим лицом ... оптового склада
        $this->assertArrayHasKey('delivery_text', $data); 
        $this->assertIsString($data['delivery_text']); //HTML Магазин... на сайте.

    }
}
