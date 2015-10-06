<?php

namespace models;

use lib\Core;
use PDO;

class Restaurant
{

    protected $core;

    function __construct()
    {
        $this->core = Core::getInstance();
        $this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

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