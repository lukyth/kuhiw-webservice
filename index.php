<?php

require 'vendor/autoload.php';
require 'config.php';

$app = new \Slim\Slim(array(
    'debug' => true
));

$routes = glob('routes/*.php');
foreach ($routes as $route) {
    require $route;
}

$app->run();