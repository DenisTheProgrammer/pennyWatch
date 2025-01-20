<?php
require_once "../model/dataAccess.php";
require_once "../model/logIn.php";
require_once "../model/customer.php";
session_start();
function calculateDisposableIncome($month, $year)
{
    $monthlyIncome = getTotalIncomeByMonth($month, $year, $_SESSION["customerDetails"][0]->customerID);
    $monthlyCost = getTotalCostByMonth($month, $year, $_SESSION["customerDetails"][0]->customerID);
    $disposableIncome = $monthlyIncome - $monthlyCost;
    return number_format((double)$disposableIncome, 2, '.', '');
}

function getFeedbackMessage($disposableIncome)
{
    if ($disposableIncome < 0) {
        return "You're in debt. Try to save more money or reduce your expenses.";
    } elseif ($disposableIncome > 0) {
        return "Congratulations! You're making progress towards saving.";
    } else {
        return "You're breaking even on your disposable income.";
    }
}
?>