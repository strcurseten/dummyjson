<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$id = $_GET['product_id'];
$response = $client->get('https://dummyjson.com/products/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body, true);
//var_dump($product);
?>

<?php ?>
<html>
        <title><?php echo $product['title']; ?></title>
        <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
        <body>
                <div class="card m-5">
                        <div class="row">
                                <div class="col md-6 p-5 mx-1">
                                        <h6><?php echo $product['category']; ?></h3>
                                        <img src="<?php echo $product['thumbnail']; ?>" alt="">
                                </div>
                                <div class="col md-6 p-5">
                                        <h3><?php echo $product['title']; ?></h3>
                                        <h5><?php echo $product['brand']; ?></h3>
                                        <h4>$<?php echo $product['price']; ?></h3>
                                        <p]><?php echo $product['description']; ?></h3>
                                </div>
                        </div>
                </div>
        </body>
</html>