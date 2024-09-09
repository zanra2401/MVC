<?php
require_once "./vendor/autoload.php";
require_once "./app/core/config.php";
require_once "./app/init.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$app = new App("Zanra", "index");

