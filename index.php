<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'debug' => true
));

$routes = glob('routes/*.php');
foreach ($routes as $route) {
    require $route;
}

$app->run();

function getConnection() {
    try {
        $db_host = "Host";
        $db_name = "Database name";
        $db_user = "Username";
        $db_password = "Password";
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}