<?php

use models\Restaurant;

$app->contentType('application/json; charset=utf-8');

$app->group(
    '/restaurant', function () use ($app) {

        $app->get(
            '/', function () use ($app) {
                $model = new Restaurant();
                echo json_encode($model->getRestaurants(), JSON_UNESCAPED_UNICODE);
            }
        );

        $app->get(
            '/:id', function ($id) use ($app) {
                $model = new Restaurant();
                echo json_encode($model->getRestaurant($id), JSON_UNESCAPED_UNICODE);
            }
        );

        $app->get(
            '/:id/owner', function ($id) use ($app) {
                $model = new Restaurant();
                echo json_encode($model->getRestaurantOwners($id), JSON_UNESCAPED_UNICODE);
            }
        );

    }
);