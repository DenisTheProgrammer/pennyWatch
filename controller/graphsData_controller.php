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

    $dataIncomesBarChart = array( 
        array("y" => 3373.64, "label" => "Germany" ),
        array("y" => 2435.94, "label" => "France" ),
        array("y" => 1842.55, "label" => "China" ),
        array("y" => 1828.55, "label" => "Russia" ),
        array("y" => 1039.99, "label" => "Switzerland" ),
        array("y" => 765.215, "label" => "Japan" ),
        array("y" => 612.453, "label" => "Netherlands" )
    );

    
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