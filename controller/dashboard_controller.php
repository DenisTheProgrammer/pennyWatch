<?php
require_once "../controller/financeFunctions.php";

$disposableIncome = calculateDisposableIncome(date("n"), date("Y"));
$message = getFeedbackMessage($disposableIncome);
require_once "../view/dashboard_view.php";
?>