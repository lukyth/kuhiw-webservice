<?php

class MenuTest extends \PHPUnit_Framework_TestCase
{

    public function testGetMenuShouldReturnForRestaurantFields()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->get('http://localhost:8000/menu/1');

        $this->assertEquals(200, $response->getStatusCode());

        $array = $response->json();

        foreach ($array as $obj) {
            $this->assertArrayHasKey('id', $obj);
            $this->assertArrayHasKey('restaurant_id', $obj);
            $this->assertArrayHasKey('name', $obj);
            $this->assertArrayHasKey('price_min', $obj);
            $this->assertArrayHasKey('price_max', $obj);
        }
    }
}