<?php
//here link this to the data access and figure out the database structure to store the data you want to access in the graph
//just learnt that arrays and numbers in javascript will be accessed using their key that they get stored as in their array rather than the php name

    $dataSeries1 = array(
        array("label" => "Monday", "y" => 30),
        array("label" => "Tuesday", "y" => 20),
        array("label" => "Wednesday", "y" => 25),
        array("label" => "Thursday", "y" => 10),
        array("label" => "Friday", "y" => 15),
        array("label" => "Saturday", "y" => 40),
        array("label" => "Sunday", "y" => 35)
    );
    
    $dataSeries2 = array(
        array("label" => "Monday", "y" => 20),
        array("label" => "Tuesday", "y" => 15),
        array("label" => "Wednesday", "y" => 30),
        array("label" => "Thursday", "y" => 25),
        array("label" => "Friday", "y" => 35),
        array("label" => "Saturday", "y" => 50),
        array("label" => "Sunday", "y" => 45)
    );
    
    // Combine both data series into one response
    $data = array(
        "series1" => $dataSeries1,
        "series2" => $dataSeries2
    );
    
    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($data, JSON_NUMERIC_CHECK);


?>