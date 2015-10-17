<?php

use models\Menu;

$app->contentType('application/json; charset=utf-8');

$app->group(
    
    '/menu', function () use ($app) {

        $app->get(
            '/', function () use ($app) {
                $model = new Menu();
                echo json_encode($model->getMenus(), JSON_UNESCAPED_UNICODE);
            }

        );

        $app->get(
            '/:restaurant_id', function ($restaurant_id) use ($app) {
                $model = new Menu();
                echo json_encode($model->getMenu($restaurant_id), JSON_UNESCAPED_UNICODE);
            }
        );
    }
);