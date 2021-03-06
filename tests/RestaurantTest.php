<?php

class RestaurantTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRestaurantShouldReturnAllRestaurantFields()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->get('http://localhost:8000/restaurant/1');

        $this->assertEquals(200, $response->getStatusCode());

        $array = $response->json();

        foreach ($array as $obj) {
            $this->assertArrayHasKey('id', $obj);
            $this->assertArrayHasKey('name', $obj);
        }
    }
}