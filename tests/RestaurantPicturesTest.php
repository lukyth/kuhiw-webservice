<?php

class RestaurantPicturesTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRestaurantPicturesShouldReturnAllPicturesFields()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->get('http://localhost:8000/restaurant/1/pictures');

        $this->assertEquals(200, $response->getStatusCode());

        $array = $response->json();

        foreach ($array as $obj) {
            $this->assertArrayHasKey('id', $obj);
            $this->assertArrayHasKey('url', $obj);
            $this->assertArrayHasKey('restaurant_id', $obj);
        }
    }
}