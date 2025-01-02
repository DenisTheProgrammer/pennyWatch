<?php
    require_once "../model/dataAccess.php";

    $totalIncomeExample = getTotalIncomeByMonth(5,2024);
    $totalCostExample = getTotalCostByMonth(5,2024);

    $months = [
        "January", "February", "March", "April", "May", 
        "June", "July", "August", "September", "October", 
        "November", "December"
    ];

    $dataDashboardPieChart = array( 
        array("label"=>"Income", "y"=>$totalIncomeExample),
        array("label"=>"Cost", "y"=>$totalCostExample)
    );

    $dataDashboardColumnChart = array();

    for ($i = 1; $i <= count($months); $i++)
    {
        $monthlyIncome = getTotalIncomeByMonth($i, 2024);
        $monthlyCost = getTotalCostByMonth($i, 2024);
        $disposableIncome = $monthlyIncome - $monthlyCost;

        $dataDashboardColumnChart[] = array(
            "y" => $disposableIncome,
            "label" => $months[$i-1]
        );
    }

    
    // Combine both data series into one response
    $data = array(
        "dashboardPieChart" => $dataDashboardPieChart,
        "dashboardColumnChart" => $dataDashboardColumnChart
    );
    
    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($data, JSON_NUMERIC_CHECK);


?>