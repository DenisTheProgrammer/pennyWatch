<?php
require_once "../controller/financeFunctions.php";
require_once "../model/goal.php";

$filterMonth = $_REQUEST['filterMonth'] ?? ltrim(date("m"), "0");
$filterYear = $_REQUEST['filterYear'] ?? date("Y");

$totalIncome = getTotalIncomeByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$totalCost = getTotalCostByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$disposableIncome = calculateDisposableIncome($filterMonth, $filterYear);

$goals = getAllGoals($_SESSION["customerDetails"][0]->customerID);


require_once "../view/savings_view.php";
?>