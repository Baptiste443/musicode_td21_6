<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'app/model/Database.php';

require_once 'app/core/Router.php';
$router = new Router();
$router->dispatch();

?>