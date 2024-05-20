<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once (__DIR__ . "/../../config/EnvVariables.php");

// getting all brands
$ch = curl_init();
$url = "localhost:8090/api/partner/$GILBERT_KEY/stocks/orders/confirmed";
$headers = [
    'Content-Type: application/json'
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Get HTTP response status code

$all_orders = json_decode($response, true);

curl_close($ch);
