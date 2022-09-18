<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$item = [
	'json' => [
                'title' => 'Updated Title'
	]
];

$response = $client->put('https://dummyjson.com/products/1', $item);
$code = $response->getStatusCode();
$body = $response->getBody();
$update_product = json_decode($body);
var_dump($update_product);