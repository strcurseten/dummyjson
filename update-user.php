<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$user = [
	'json' => [
                'firstName' => 'Moa'
	]
];

$response = $client->put('https://dummyjson.com/users/1', $user);
$code = $response->getStatusCode();
$body = $response->getBody();
$update_user = json_decode($body);
var_dump($update_user);

?>