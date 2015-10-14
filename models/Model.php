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

}