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
        <form method="POST" enctype="application/json">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="text" name="password" placeholder="Password">
            <input type="submit" class="btn btn-primary">
        </form>
    </body>
</html>

<?php

if (isset($_POST['username'])) {
    if (isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $response = $client->post('https://dummyjson.com/auth/login/');
        // . $username . '/' . $password
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $user_login = json_decode($body, true);

        $body['username'] = $username;
        $body['password'] = $password;

        var_dump($user_login);

    } else {
        echo "No user";
    }
}

?>