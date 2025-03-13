<?php
require_once "../model/dataAccess.php";
require __DIR__ . '/../vendor/autoload.php'; // Always finds the correct path

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // Move up to the project root directory
$dotenv->load();

use GuzzleHttp\Client;

//get public token
header("Content-Type: application/json");
$input = json_decode(file_get_contents("php://input"), true);
$publicToken = $input["publicToken"];

$client = new Client();

//plaid credentials
$clientID = $_ENV['PLAID_CLIENT_ID'];
$secret = $_ENV['PLAID_SECRET'];
$environment = $_ENV['PLAID_ENV'];

//API url for exchanging public token
$url = "https://sandbox.plaid.com/item/public_token/exchange";

try{
    $response = $client->post($url, [
        'json' => [
            'client_id' => $clientID,
            'secret' => $secret,
            'public_token' => $publicToken,
        ]
    ]);

    $data = json_decode($response->getBody(), true);

    //get the access token
    $accessToken = $data["access_token"];
    //the function below stores the access token in the database for increased security
    //storeAccessToken($input["user_id"], $accessToken, $_SESSION["customerDetails"][0]->customerID);
    echo json_encode(["accessToken" => $accessToken]); //prepare to send the access token away
}catch (Exception $e){
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
?>