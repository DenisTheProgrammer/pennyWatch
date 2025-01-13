<?php
    require_once "../controller/financeFunctions.php";

    $months = [
        "January", "February", "March", "April", "May", 
        "June", "July", "August", "September", "October", 
        "November", "December"
    ];

    $dataDashboardPieChart = array( 
        array("label"=>"Income", "y"=>getTotalIncomeByMonth(5, 2024, $_SESSION["customerDetails"][0]->customerID)),
        array("label"=>"Cost", "y"=>getTotalCostByMonth(5, 2024, $_SESSION["customerDetails"][0]->customerID))
    );

    $dataDashboardColumnChart = array();

    for ($i = 1; $i <= count($months); $i++)
    {
        $disposableIncome = calculateDisposableIncome($i, 2024);

        $dataDashboardColumnChart[] = array(
            "y" => $disposableIncome,
            "label" => $months[$i-1]
        );
    }

    $dataIncomesBarChart = array();

    for ($i = 1; $i <= count($months); $i++)
    {
        $dataIncomesBarChart[] = array(
            "y" => getTotalIncomeByMonth($i, 2024, $_SESSION["customerDetails"][0]->customerID),
            "label" => $months[$i-1]
        );
    }

    
    // Combine data series into one response
    $data = array(
        "dashboardPieChart" => $dataDashboardPieChart,
        "dashboardColumnChart" => $dataDashboardColumnChart,
        "incomesBarChart" => $dataIncomesBarChart
    );
    
    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($data, JSON_NUMERIC_CHECK);


?>