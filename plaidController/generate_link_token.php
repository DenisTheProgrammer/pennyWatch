<?php
require "../vendor/autoload.php";

use GuzzleHttp\Client;

// Instantiate a new Guzzle client instance
$client = new Client();

//Plaid credentials
$clientID = "67975cdf486f1b002290db46";
$secret = "e328d8859e1c9311b92f82d3178c8d";
$environment = "sandbox";

//URL to generate a link token
$url = "https://sandbox.plaid.com/link/token/create";

try{
    // Send a POST request to the Plaid API to generate a link token
    $response = $client->post($url, [
        'json' => [
            'client_id' => $clientID,
            'secret' => $secret,
            "user" => ["client_user_id" => uniqid()],//genrate an unique user id
            "client_name" => "pennywatch",
            "products" => ["auth", "transactions"],//products needed
            "country_codes" => ["GB"],
            "language" => "en",
        ]
    ]);
    //decode and return the link token
    $data = json_decode($response->getBody(), true);
    echo json_encode(["link_token" => $data["link_token"]]); //encode the link token as json ready to be sent to the front end
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>