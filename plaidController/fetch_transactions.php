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
$url = "https://sandbox.plaid.com/transactions/sync";

$hasMore = true;
$cursor = null; 
$transactions = [];
//$x = 0; // counter for debugging calls
$emptyCount = 0;

while ($hasMore) {
    try{
        $response = $client->post($url, [
            'json' => [
                'client_id' => $clientID,
                'secret' => $secret,
                'access_token' => $accessToken,
                'cursor' => $cursor,  // Pass the cursor for pagination
                "count" => 500,
            ]
        ]);
        $data = json_decode($response->getBody(), true);
        $transactions = array_merge($transactions, $data["added"]);

        //$x++;

        //print_r("Call number: " . $x);

        //print_r("Transactions in this call: " . count($data["added"]) . "\n");       

        if (isset($data["next_cursor"]))
        {
            $cursor = $data["next_cursor"]; // get the next page
        } else
        {
            $hasMore = false; // No more transactions to fetch
        }

        if (count($data["added"]) === 0) {
            $emptyCount++;
            if ($emptyCount > 3) {
                break; // Stop fetching if no new transactions after 3 calls
            }
        } else {
            $emptyCount = 0; // Reset if new transactions appear
        }

        }catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["error" => $e->getMessage()]);
            break;
        }

        usleep(1200000); // make a call every 1.2 seconds to stay under 50 calls per minute
}

foreach($transactions as $transaction)
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

echo json_encode([
    'done' => true,
]);

?>