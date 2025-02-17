<?php
require "../vendor/autoload.php";
require_once "../model/dataAccess.php";
require_once "../model/cost.php";
require_once "../model/income.php";
require_once "../model/customer.php";
session_start();

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

$hasMore = true;
$offset = 0; // start at first page

while ($hasMore) {
    try{
        $response = $client->post($url, [
            'json' => [
                'client_id' => $clientID,
                'secret' => $secret,
                'access_token' => $accessToken,
                'start_date' => '2024-01-01',
                'end_date' => date('Y-m-d'),
                'options' => [
                    'count' => 500,
                    'offset' => $offset
                ]
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        foreach($data["transactions"] as $transaction)
        {
            if($transaction["amount"] < 0)
            {
                $income = new Income();
                $income->incomeReference = $transaction["name"];
                $income->incomeAmount = abs($transaction["amount"]);
                $income->category = $transaction["personal_finance_category"]["primary"];
                $income->date = $transaction["date"];
                $income->recurring = 0;

                addIncome($income, $_SESSION["customerDetails"][0]->customerID);
             }
             else
             {
                $cost = new Cost();
                $cost->costReference = $transaction["name"];
                $cost->costAmount = $transaction["amount"];
                $cost->category = $transaction["personal_finance_category"]["primary"];
                $cost->date = $transaction["date"];
                $cost->recurring = 0;

                addCost($cost, $_SESSION["customerDetails"][0]->customerID);
             }
        }

        if (count($data["transactions"]) < 500) 
        {
            $hasMore = false; // Stop when fewer transactions than call, meaning there are no more transactions
        } 
        else 
        {
            $offset += 500; // Get next batch of transactions
        }

        usleep(1230000); // make a call every 1.23 seconds to stay under 50 calls per minute


    }catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["error" => $e->getMessage()]);
            break;
        }
}

echo json_encode([
    'done' => true,
]);

?>