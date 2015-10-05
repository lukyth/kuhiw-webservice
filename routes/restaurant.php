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
        $sql = "SELECT * FROM owners WHERE id=:id";
        try {
            $db = getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $owner = $stmt->fetchObject();
            $db = null;
            echo json_encode($owner);
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    });

});