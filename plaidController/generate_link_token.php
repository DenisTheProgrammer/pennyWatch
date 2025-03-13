<?php
require __DIR__ . '/../vendor/autoload.php'; // Always finds the correct path

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // Move up to the project root directory
$dotenv->load();

use GuzzleHttp\Client;

// Instantiate a new Guzzle client instance
$client = new Client();

//Plaid credentials
$clientID = $_ENV['PLAID_CLIENT_ID'];
$secret = $_ENV['PLAID_SECRET'];
$environment = $_ENV['PLAID_ENV'];

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