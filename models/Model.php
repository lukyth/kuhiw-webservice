<?php

namespace models;

use lib\Core;
use PDO;

class Model
{

    protected $core;

    function __construct()
    {
        $this->core = Core::getInstance();
        $this->core->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function query($sql, $params = array())
    {
        try {
            $stmt = $this->core->dbh->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

}