<?php
require_once "../model/dataAccess.php";
require_once "../model/income.php";
require_once "../model/customer.php";
session_start();

// Get the filter values from POST or set defaults
$filterCategory = $_POST['filterCategory'] ?? 'All';
$filterMonth = $_POST['filterMonth'] ?? 'All';
$filterYear = $_POST['filterYear'] ?? 'All';

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

if (empty($conditions)) {
    $incomes = getAllIncomes($_SESSION["customerDetails"][0]->customerID);
} else {
    $incomes = getIncomesDynamically($conditions, $filters);
}

require_once "../view/incomes_view.php";
?>
