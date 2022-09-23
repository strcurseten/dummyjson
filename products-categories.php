<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/products/categories');
$code = $response->getStatusCode();
$body = $response->getBody();
$categories = json_decode($body, true);
//var_dump($categories);
?>

<html>
        <body>
                <h1>Product Categories</h1>
        <?php
                foreach ($categories as $category) {
        ?>
                <h4><?php echo $category; ?></h4>
        <?php
                }
        ?>
        </body>
</html>

