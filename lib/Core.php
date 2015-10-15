<?php

namespace lib;

use lib\Config;
use PDO;

class Core
{
    public $dbh;
    private static $_instance;

    private function __construct()
    {
        $dsn =  'mysql:host=' . Config::read('db.host') .
                ';dbname='    . Config::read('db.name') .
                ';port='      . Config::read('db.port') .
                ';connect_timeout=15';
        $user = Config::read('db.user');
        $password = Config::read('db.password');
        $this->dbh = new PDO($dsn, $user, $password);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            $object = __CLASS__;
            self::$_instance = new $object;
        }
        return self::$_instance;
    }
}