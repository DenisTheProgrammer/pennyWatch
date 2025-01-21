<?php

require_once "../model/dataAccess.php";
require_once "../model/cost.php";
require_once "../model/customer.php";
require_once "../model/goal.php";
session_start();

if (isset($_REQUEST["addCostButton"]))
{
    require_once "../view/addCost_view.php";
}
else if(isset($_REQUEST["confirmDetails"]))
{
    $cost = new Cost();
    $cost->costReference = $_REQUEST["costReference"];
    $cost->costAmount = $_REQUEST["costAmount"];
    $cost->category = $_REQUEST["category"];
    $cost->date = $_REQUEST["date"];
    if(!isset($_REQUEST["recurring"]))
    {
        $cost->recurring = 0;
    }
    else
    {
        $cost->recurring = 1;
    }

    addCost($cost, $_SESSION["customerDetails"][0]->customerID);

    require_once "../view/addCost_view.php";
}
else
{
    // Get the filter values from POST or set defaults
    $filterCategory = $_REQUEST['filterCategory'] ?? 'All';
    $filterMonth = $_REQUEST['filterMonth'] ?? 'All';
    $filterYear = $_REQUEST['filterYear'] ?? 'All';

    // Initialize the conditions array
    $conditions = [];
    $filters = [];

    // Apply filters based on the selected values
    if ($filterCategory != 'All') {
        $conditions[] = 'category = :category';
        $filters['category'] = $filterCategory;
    }

    if ($filterMonth != 'All') {
        $conditions[] = 'MONTH(date) = :month';
        $filters['month'] = $filterMonth;
    }

    if ($filterYear != 'All') {
        $conditions[] = 'YEAR(date) = :year';
        $filters['year'] = $filterYear;
    }

    $filters['customer_id'] = $_SESSION["customerDetails"][0]->customerID;

    if (empty($conditions) || isset($_REQUEST["resetButton"])) {
        $filterCategory = "All";
        $filterMonth = "All";
        $filterYear = "All";
        $costs = getAllCosts($_SESSION["customerDetails"][0]->customerID);
    } else {
        $costs = getCostsDynamically($conditions, $filters);
    }

    if(isset($_REQUEST["deleteButton"]))
    {
        $cost = getCostByID($_REQUEST["IDPass"]);
        if($cost->category == "Goal")
        {
            list($goalName, $goalID) = explode("-", str_replace("Goal Payment: ", "", $cost->costReference));
            $goal = getGoalById($goalID);
            $goalAmount = $goal->goalAmount - (double)$cost->costAmount;
            addNewGoalPayment((double)$cost->costAmount*-1, date('Y-m-d'), $goalID, $goalAmount);
            deleteCost($_REQUEST["IDPass"]);
        }
        else
        {
            deleteCost($_REQUEST["IDPass"]);
        }

        $costs = getAllCosts($_SESSION["customerDetails"][0]->customerID); //get all costs again to preserve pagination
    }

    require_once "../view/costs_view.php";
}

?>