<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->delete('https://dummyjson.com/users/1');
$code = $response->getStatusCode();
$body = $response->getBody();
$delete_user = json_decode($body);
var_dump($delete_user);

?>