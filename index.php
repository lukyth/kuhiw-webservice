<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'debug' => true
));

$app->get('/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/', function () {
    echo "Hello, Kid";
});

$app->run();