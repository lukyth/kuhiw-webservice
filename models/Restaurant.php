<?php

namespace models;

use PDO;

class Restaurant extends Model
{

    public function getRestaurant($id)
    {
        return $this->query(
            "SELECT * FROM restaurants WHERE id=:id", array(
            'id' => $id
            )
        );
    }

    public function getRestaurants()
    {
        return $this->query("SELECT * FROM restaurants WHERE name NOT LIKE 'NoBooth'");
    }

    public function getRestaurantOwners($id)
    {
        return $this->query(
            "SELECT * FROM owners WHERE restaurant_id=:id", array(
            'id' => $id
            )
        );
    }

    public function getRestaurantPictures($id)
    {
        return $this->query(
            "SELECT * FROM restaurant_pictures WHERE restaurant_id=:id", array(
            'id' => $id
            )
        );
    }

    public function getRestaurantComments($id)
    {
        return $this->query(
            "SELECT * FROM comments,users WHERE restaurant_id=:id", array(
            'id' => $id
            )
        );
    }
}