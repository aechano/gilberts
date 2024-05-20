<?php
require_once (__DIR__ . '/vendor/autoload.php');

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$GILBERT_KEY = $_ENV['GILBERTS_TJ_KEY'];
