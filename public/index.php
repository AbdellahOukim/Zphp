<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

use app\core\Application;

$app = new Application();


include_once '../routes/main.php';


$app->run();
