<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$id = $_GET['user_id'];
$response = $client->get('https://dummyjson.com/users/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body, true);
$completeName = $user['firstName'] . ' ' . $user['maidenName'] . ' ' . $user['lastName'];
//var_dump($user);
?>

<html>
        <title><?php echo $completeName ?></title>
        <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
        <body>
                <div class="card mx-auto p-5" style="width: 1200px;">
                        <div class="row">
                                <div class="col-sm-4">
                                        <img src="<?php echo $user['image']; ?>" class="mx-auto"><br>
                                        <h5><?php echo $user['company']['title'] . ' | ' . $user['company']['department']; ?></h5>
                                        <h6><?php echo $user['company']['name']; ?></h6>
                                        <h5 class="mt-5">INFO</h5>
                                        <p>Email: <?php echo $user['email']; ?></p>
                                        <p>Phone: <?php echo $user['phone']; ?></p>
                                        <p>Username: <?php echo $user['username']; ?></p>
                                        <p>Password: <?php echo $user['password']; ?></p>

                                </div>
                                <div class="col-sm-8 my-5">
                                        <h3><?php echo $completeName ?></h3>
                                        <h4><?php echo $user['gender'] . ', ' . $user['age']; ?></h3>
                                        <h5><?php echo $user['domain'] . ' | ' .$user['ip'] . ' | ' . $user['macAddress']; ?></h5>

                                        <h5 class="mt-5">ABOUT</h5>
                                        <p>Bithday: <?php echo $user['birthDate']; ?></p>
                                        <p>Blood Type: <?php echo $user['bloodGroup']; ?></p>
                                        <p>Height: <?php echo $user['height']; ?></p>
                                        <p>Weight: <?php echo $user['weight']; ?></p>
                                        <p>Eye Color: <?php echo $user['eyeColor']; ?></p>
                                        <p>Hair Color: <?php echo $user['hair']['color']; ?></p>
                                        <p>Hair Type: <?php echo $user['hair']['type']; ?></p>

                                        <h5 class="mt-5">ADDRESS</h5>
                                        <p><?php echo $user['address']['address'] . ', ' . $user['university']; ?></p>
                                        <p><?php echo $user['address']['city'] . ', ' . $user['address']['state'] . ' ' . $user['address']['postalCode']; ?></p>
                                        <p><?php echo $user['address']['coordinates']['lat'] . ', ' . $user['address']['coordinates']['lng']; ?></p>

                                        <h5 class="mt-5">BANK</h5>
                                        <p>Card Expiry Date: <?php echo $user['bank']['cardExpire']; ?></p>
                                        <p>Card Number: <?php echo $user['bank']['cardNumber']; ?></p>
                                        <p>Card Type: <?php echo $user['bank']['cardType']; ?></p>
                                        <p>Currency: <?php echo $user['bank']['currency']; ?></p>
                                        <p>IBAN: <?php echo $user['bank']['iban']; ?></p>

                                        <h5 class="mt-5">COMPANY</h5>
                                        <p>Company: <?php echo $user['company']['name']; ?></p>
                                        <p>Position: <?php echo $user['company']['title']; ?></p>
                                        <p>EIN: <?php echo $user['ein']; ?></p>
                                        <p>SSN: <?php echo $user['ssn']; ?></p>
                                        <p>Department: <?php echo $user['company']['department']; ?></p>
                                        <p>User Agent: <?php echo $user['userAgent']; ?></p>
                                        <p><?php echo $user['company']['address']['city'] . ', ' . $user['company']['address']['state'] . ' ' . $user['company']['address']['postalCode']; ?></p>
                                        <p><?php echo $user['company']['address']['coordinates']['lat'] . ', ' . $user['company']['address']['coordinates']['lng']; ?></p>
                                </div>
                        </div>
                </div>
        </body>
</html>