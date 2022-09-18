<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->delete('https://dummyjson.com/products/1');
$code = $response->getStatusCode();
$body = $response->getBody();
$add_product = json_decode($body);
var_dump($add_product);
