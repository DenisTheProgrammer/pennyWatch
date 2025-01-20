<?php
class Goal
{
    private $goalID;
    private $goalName;
    private $goalType;
    private $goalAmount;
    private $recurring;
    private $recurringInterval;
    private $dateCreated;
    private $lastPaymentAmount;
    private $lastPaymentDate;
    private $customerID;

    function __get($name)
    {
        return $this->$name;
    }
    
    function __set($name, $value)
    {
        $this->$name = $value;
    }
}

?>