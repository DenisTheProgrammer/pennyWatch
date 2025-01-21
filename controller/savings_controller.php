<?php
require_once "../controller/financeFunctions.php";
require_once "../model/goal.php";
require_once "../model/cost.php";

$filterMonth = $_REQUEST['filterMonth'] ?? ltrim(date("m"), "0");
$filterYear = $_REQUEST['filterYear'] ?? date("Y");

if(isset($_REQUEST["deleteButton"]))
{
    deleteGoal($_REQUEST["IDPass"]);
}

if(isset($_REQUEST["payButton"]))
{
    $goal = getGoalById($_REQUEST["IDPass"]);
    $goalAmount = $goal->goalAmount + (double)$_REQUEST["paymentInput"];
    print_r($goalAmount);
    addNewGoalPayment($_REQUEST["paymentInput"], date('Y-m-d'), $_REQUEST["IDPass"], $goalAmount);
    $cost = new Cost();
    $cost->costReference = "Goal Payment: " . $goal->goalName;
    $cost->costAmount = $_REQUEST["paymentInput"];
    $cost->category = "Goal";
    $cost->date = date('Y-m-d');
    $cost->recurring = 0;
    $cost->customerID = $_SESSION["customerDetails"][0]->customerID;
    addCost($cost, $_SESSION["customerDetails"][0]->customerID);
}
$goals = getAllGoals($_SESSION["customerDetails"][0]->customerID);
$totalIncome = getTotalIncomeByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$totalCost = getTotalCostByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$disposableIncome = calculateDisposableIncome($filterMonth, $filterYear);


require_once "../view/savings_view.php";
?>