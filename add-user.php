<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$user = [
	'json' => [
                'id' => '304',
                'firstName' => 'Moa'
	]
];

$response = $client->post('https://dummyjson.com/users/add', $user);
$code = $response->getStatusCode();
$body = $response->getBody();
$add_user = json_decode($body);
var_dump($add_user);

?>