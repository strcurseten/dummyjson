<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/products');
$code = $response->getStatusCode();
$body = $response->getBody();
$products_list = json_decode($body, true);

?>

<html>
        <title>Products</title>
        <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
        
        <body>  
                <div class="d-flex">
                        <div class="row align-items">
                        <?php
                        foreach ($products_list as $products) {
                                foreach ($products as $item){
                        ?>
                                <div class="col mx-auto p-4">
                                        <div class="card mx-auto" style="width: 18rem;">
                                                        <img src="<?php echo $item['thumbnail']; ?>" class="img-responsive" height="200px">
                                                        <div class="card-body">
                                                                <h5 class="card-title"><?php echo $item['title']; ?></h5>
                                                                <h6 class="card-title"><?php echo $item['category']; ?></h6>
                                                                <h6 class="card-title"><?php echo $item['price']; ?></h6>
                                                                <p class="card-text"><?php echo $item['description']; ?></p>
                                                                <p class="card-text"><?php echo $item['brand']; ?></p>
                                                                <a href="single-product.php?product_id=<?php echo $item['id']; ?>" class="btn btn-primary">See Details</a>
                                                        </div>
                                        
                                        </div>
                                </div>
                        <?php
                                }
                        }
                        ?>
                        </div>
                </div>
        </body>
</html>