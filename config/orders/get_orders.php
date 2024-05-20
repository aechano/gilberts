<?php
// getting all pre-order

$ch = curl_init();
$url = "localhost:8090/api/tj/preorder/all";

$headers = [
    'Content-Type: application/json'
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Get HTTP response status code

if ($httpCode === 204) {
    $all_preorder = [];
} else {
    $all_preorder = json_decode($response, true);
}

curl_close($ch);