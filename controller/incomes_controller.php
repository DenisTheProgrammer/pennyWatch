<?php
require_once "../model/dataAccess.php";
require_once "../model/income.php";

$incomes = getAllIncomes();

require_once "../view/incomes_view.php";
?>