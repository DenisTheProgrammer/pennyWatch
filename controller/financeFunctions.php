<?php
require_once "../model/dataAccess.php";
function calculateDisposableIncome($month, $year)
{
    $monthlyIncome = getTotalIncomeByMonth($month, $year);
    $monthlyCost = getTotalCostByMonth($month, $year);
    return $monthlyIncome - $monthlyCost;
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