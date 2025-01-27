<?php
require "../vendor/autoload.php";

use GuzzleHttp\Client;

//retrieve data for the access token
header ('Content-Type: application/json');
$input = json_decode(file_get_contents("php://input"), true);
$accessToken = $input["accessToken"];

$client = new Client();

//plaid credentials
$clientID = "67975cdf486f1b002290db46";
$secret = "e328d8859e1c9311b92f82d3178c8d";
$environment = "sandbox";

//API URL for fetching transactions
$url = "https://sandbox.plaid.com/transactions/get";

try{
    $response = $client->post($url, [
        'json' => [
            'client_id' => $clientID,
            'secret' => $secret,
            'access_token' => $accessToken,
            'start_date' => '2022-01-01',
            'end_date' => date('Y-m-d'),
        ],
    ]);
    $data = json_decode($response->getBody(), true);
    //echo json_encode(["transactions" => $data["transactions"]]);//encode the transactions data ready to send away

    print_r($data["transactions"]);

}catch (Exception $e){
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}

?>