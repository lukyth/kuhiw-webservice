<?php

class IndexTest extends \PHPUnit_Framework_TestCase
{

    public function testGetIndexShouldReturnHelloKid()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->get('http://localhost:8000/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("Hello, Kid!", $response->getBody());
    }
}