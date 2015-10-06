<?php

use models\Restaurant;

$app->group('/restaurant', function () use ($app) {

    $app->get('/', function () use ($app) {
        $model = new Restaurant ();
        $restaurants = $model->getRestaurants();
        $app->contentType('application/json');
        echo json_encode($restaurants);
    });

    $app->get('/:id', function ($id) use ($app) {
        $model = new Restaurant ();
        $restaurant = $model->getRestaurant($id);
        $app->contentType('application/json');
        echo json_encode($restaurant);
    });

    $app->get('/:id/owner', function ($id) use ($app) {
        $model = new Restaurant ();
        $owners = $model->getRestaurantOwners($id);
        $app->contentType('application/json');
        echo json_encode($owners);
    });

});