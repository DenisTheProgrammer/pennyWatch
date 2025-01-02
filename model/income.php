<?php
require_once "../model/dataAccess.php";

class Income
{
    private $incomeID;
    private $incomeReference;
    private $incomeAmount;
    private $category;
    private $date;
    private $recurring;
    private $customerID;

    // getters and setters

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    //methods
        
}

?>