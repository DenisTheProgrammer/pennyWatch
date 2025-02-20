<?php
require_once "../controller/financeFunctions.php";
require_once "../model/goal.php";
require_once "../model/cost.php";
require_once "../model/income.php";
require_once "../controller/excelDownload_controller.php";

$filterMonth = $_REQUEST['filterMonth'] ?? ltrim(date("m"), "0");
$filterYear = $_REQUEST['filterYear'] ?? date("Y");

$totalIncome = getTotalIncomeByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$totalCost = getTotalCostByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$disposableIncome = calculateDisposableIncome($filterMonth, $filterYear);

$incomes = getIncomesByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);
$costs = getCostsByMonth($filterMonth, $filterYear, $_SESSION["customerDetails"][0]->customerID);

$startDate = date("d-m-Y", strtotime("first day of $filterYear-$filterMonth"));
$endDate = date("d-m-Y", strtotime("last day of $filterYear-$filterMonth"));

if(isset($_REQUEST["downloadSummary"]))
{
    if (empty($incomes) && empty($costs)) 
    {
        $downloadMessage = "No incomes and costs available for this month, please pick a different one";
    } 
    else 
    {
        downloadBreakdown($incomes, $costs, $totalIncome, $totalCost, $disposableIncome, $startDate, $endDate);
    }

}

require_once "../view/breakdown_view.php";
?>