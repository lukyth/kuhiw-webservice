<?php

class RestaurantCommentsTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRestaurantCommentsShouldReturnAllCommentFields()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->get('http://localhost:8000/restaurant/1/comments');

        $this->assertEquals(200, $response->getStatusCode());

        $array = $response->json();

        foreach ($array as $obj) {
            $this->assertArrayHasKey('comment.sid', $obj);
            $this->assertArrayHasKey('restaurant_id', $obj);
            $this->assertArrayHasKey('user_id', $obj);
            $this->assertArrayHasKey('comment', $obj);
            $this->assertArrayHasKey('name', $obj);
        }
    }
}