<?php
require_once "../controller/financeFunctions.php";

$disposableIncome = calculateDisposableIncome(5, 2024);
$message = getFeedbackMessage($disposableIncome);
require_once "../view/dashboard_view.php";
?>