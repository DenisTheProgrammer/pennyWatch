<?php
require_once "../model/dataAccess.php";
require "../vendor/autoload.php";
session_start();

use GuzzleHttp\Client;

//get public token
header("Content-Type: application/json");
$input = json_decode(file_get_contents("php://input"), true);
$publicToken = $input["publicToken"];

$client = new Client();

//plaid credentials
$clientID = "67975cdf486f1b002290db46";
$secret = "e328d8859e1c9311b92f82d3178c8d";
$environment = "sandbox";

//API url for exchanging public token
$url = "https://sandbox.plaid.com/item/public_token/exchange";

try{
    $response = $client->post($url, [
        'json' => [
            'client_id' => $clientID,
            'secret' => $secret,
            'publicToken' => $publicToken,
        ]
    ]);

    $data = json_decode($response->getBody(), true);

    //get the access token
    $accessToken = $data["access_token"];
    //the function below stores the access token in the database for increased security
    //storeAccessToken($input["user_id"], $accessToken, $_SESSION["customerDetails"][0]->customerID);
    echo json_encode(["access_token" => $accessToken]); //prepare to send the access token away
}catch (Exception $e){
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
?>