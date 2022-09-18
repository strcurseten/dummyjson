<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/products');
$code = $response->getStatusCode();
$body = $response->getBody();
$products_categories = json_decode($body, true);
$categories = array_map("unserialize", array_unique(array_map("serialize", $products_categories)));

?>

<html>
        <body>
        <?php
                foreach ($categories as $category) {
                        foreach ($category as $value){
        ?>
                <h5><?php echo $value['category']; ?></h5>
        <?php
                        }
                }
        ?>
        </body>
</html>

