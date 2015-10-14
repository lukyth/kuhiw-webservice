<?php

namespace models;

use PDO;

class Restaurant extends Model
{

    public function getRestaurant($id)
    {
        $sql = "SELECT * FROM restaurants WHERE id=:id";
        try {
            $stmt = $this->core->dbh->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $restaurant = $stmt->fetchObject();
            return $restaurant;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getRestaurants()
    {
        $sql = "SELECT * FROM restaurants";
        try {
            $stmt = $this->core->dbh->prepare($sql);
            $stmt->execute();
            $restaurants = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $restaurants;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getRestaurantOwners($id)
    {
        $sql = "SELECT * FROM owners WHERE restaurant_id=:id";
        try {
            $stmt = $this->core->dbh->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $owner = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $owner;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

}