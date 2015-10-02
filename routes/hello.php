<?php

$app->group('/hello', function () use ($app) {

    $app->get('/:name', function ($name) {
        echo "Hello, $name";
    });

});