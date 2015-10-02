<?php

$app->group('/restaurant', function () use ($app) {

    $app->get('/:id', function ($id) {
        echo json_encode([
            'name' => 'restaurant_' . $id . '_name',
            'latitude' => 'restaurant_' . $id . '_latitude',
            'longitude' => 'restaurant_' . $id . '_longitude'
        ]);
    });

    $app->get('/menu/:id', function ($id) {
        echo json_encode([
            'name' => 'menu_' . $id . '_name',
            'price' => 'menu_' . $id . '_price'
        ]);
    });

    $app->get('/owner/:id', function ($id) {
        echo json_encode([
            'name' => 'owner_' . $id . '_name'
        ]);
    });

});