<?php

require_once "../model/dataAccess.php";
require_once "../model/income.php";
require_once "../model/customer.php";
session_start();

$categories = getIncomeCategories($_SESSION["customerDetails"][0]->customerID);

if (isset($_REQUEST["addIncomeButton"]))
{
    require_once "../view/addIncome_view.php";
}
else if(isset($_REQUEST["confirmDetails"]))
{
    $income = new Income();
    $income->incomeReference = $_REQUEST["incomeReference"];
    $income->incomeAmount = $_REQUEST["incomeAmount"];
    $income->category = $_REQUEST["category"];
    $income->date = $_REQUEST["date"];
    if(!isset($_REQUEST["recurring"]))
    {
        $income->recurring = 0;
    }
    else
    {
        $income->recurring = 1;
    }

    addIncome($income, $_SESSION["customerDetails"][0]->customerID);

    $confirmMessage = "Income successfully added!";

    require_once "../view/addIncome_view.php";
}
else
{
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
        $incomes = getAllIncomes($_SESSION["customerDetails"][0]->customerID);
    } else {
        $incomes = getIncomesDynamically($conditions, $filters);
    }

    if(isset($_REQUEST["deleteButton"]))
    {
        deleteIncome($_REQUEST["IDPass"]);
        $incomes = getAllIncomes($_SESSION["customerDetails"][0]->customerID); //get all incomes again to preserve pagination
    }

    require_once "../view/incomes_view.php";
}

?>
