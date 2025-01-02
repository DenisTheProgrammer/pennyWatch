<?php
//here link this to the data access and figure out the database structure to store the data you want to access in the graph
//just learnt that arrays and numbers in javascript will be accessed using their key that they get stored as in their array rather than the php name

    $dataDashboardPieChart = array( 
        array("label"=>"Chrome", "y"=>64.02),
        array("label"=>"Firefox", "y"=>12.55),
        array("label"=>"IE", "y"=>8.47),
        array("label"=>"Safari", "y"=>6.08),
        array("label"=>"Edge", "y"=>4.29),
        array("label"=>"Others", "y"=>4.59)
    );

    $dataDashboardColumnChart = array( 
        array("y" => 3373.64, "label" => "Germany" ),
        array("y" => 2435.94, "label" => "France" ),
        array("y" => 1842.55, "label" => "China" ),
        array("y" => 1828.55, "label" => "Russia" ),
        array("y" => 1039.99, "label" => "Switzerland" ),
        array("y" => 765.215, "label" => "Japan" ),
        array("y" => 612.453, "label" => "Netherlands" )
    );
    
    // Combine both data series into one response
    $data = array(
        "dashboardPieChart" => $dataDashboardPieChart,
        "dashboardColumnChart" => $dataDashboardColumnChart
    );
    
    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($data, JSON_NUMERIC_CHECK);


?>