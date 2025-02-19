<?php
require_once "../controller/financeFunctions.php";
require_once "../model/goal.php";
require_once "../model/cost.php";

$filterMonth = $_REQUEST['filterMonth'] ?? ltrim(date("m"), "0");
$filterYear = $_REQUEST['filterYear'] ?? date("Y");

$totalIncome = getTotalIncomeByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$totalCost = getTotalCostByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$disposableIncome = calculateDisposableIncome($filterMonth, $filterYear);

require_once "../view/breakdown_view.php";
?>