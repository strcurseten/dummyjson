<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$item = [
	'json' => [
                'id' => '304',
                'title' => 'Something'
	]
];

$response = $client->post('https://dummyjson.com/products/add', $item);
$code = $response->getStatusCode();
$body = $response->getBody();
$add_product = json_decode($body);
var_dump($add_product);

?>