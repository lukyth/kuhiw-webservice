<?php

namespace models;

use PDO;

class Menu extends Model
{

    public function getMenu($restaurant_id)
    {
        return $this->query(
            "SELECT * FROM menus WHERE restaurant_id=:restaurant_id", array(
            'restaurant_id' => $restaurant_id
            )
        );
    }

    public function getMenus()
    {
        return $this->query("SELECT * FROM menus");
    }

}