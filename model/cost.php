<?php
class Cost
{
    private $costID;
    private $costReference;
    private $costAmount;
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