<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/users');
$code = $response->getStatusCode();
$body = $response->getBody();
$users_list = json_decode($body, true);
var_dump($users_list);

?>

<html>
        <title>Users</title>
        <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
        
        <body>  
                <div class="d-flex">
                        <div class="row align-items">
                        <?php
                        foreach ($users_list as $users) {
                                foreach ($users as $value){

                                    $completeName = $value['firstName'] . ' ' . $value['maidenName'] . ' ' . $value['lastName'];
                        ?>
                                <div class="col m-1">
                                        <div class="card mx-auto" style="width: 18rem;">
                                                        <img src="<?php echo $value['image']; ?>" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                                <h5 class="card-title"><?php echo $completeName; ?></h5>
                                                                <h6 class="card-title"><?php echo $value['age']; ?></h6>
                                                                <p class="card-text"><?php echo $value['gender']; ?></p>
                                                                <p class="card-text"><?php echo $value['email']; ?></p>
                                                                <p class="card-text"><?php echo $value['phone']; ?></p>
                                                                <p class="card-text">Blood type: <?php echo $value['bloodGroup']; ?></p>
                                                                <a href="single-user.php?user_id=<?php echo $value['id'] ?>" class="btn btn-primary">View User</a>
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