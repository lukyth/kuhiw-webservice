<?php

namespace lib;

class Config
{
    static $config;

    public static function read($name)
    {
        return self::$config[$name];
    }

    public static function write($name, $value)
    {
        self::$config[$name] = $value;
    }
}