<?php

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$GILBERT_KEY = $_ENV['GILBERTS_TJ_KEY'];

