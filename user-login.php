<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

?>

<html>
    <title>User Login</title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body>
        <div class="card-transparent mx-auto my-5 p-5 text-center" style="width:500px;">
            <h1>LOGIN</h1>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" class="mt-5" style="width:200px; height:30px;"><br>
                <input type="text" name="password" placeholder="Password" class="mt-3" style="width:200px; height:30px;"><br>
                <input type="submit" class="btn btn-primary mt-3" style="width:80px; height:40px;" name="submit_info">
            </form>

<?php

if (isset($_POST['submit_info'])) {

    try {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $login = [
            'json' => [
                    'username' => $username,
                    'password' => $password
            ]
        ];

        $response = $client->post('https://dummyjson.com/auth/login/', $login);
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $user_login = json_decode($body, true);

        //var_dump($user_login); ?>

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Successfully logged in!</h4>
            <hr>
            <p class="mb-0">User Token: <?php echo $user_login['token'] ?></p>
        </div>
            

    <?php    
    } catch (Exception $e) { 
    ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
            User not found! Please try again. 
    </div>

<?php
    }
}
?>
        </div>
    </body>
</html>