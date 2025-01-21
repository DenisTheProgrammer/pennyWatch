<?php
class Goal
{
    private $goalID;
    private $goalName;
    private $goalType;
    private $goalAmount;
    private $recurring;
    private $recurringAmount;
    private $recurringInterval;
    private $weeklyDay;
    private $monthlyDay;
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

    function calculateNextPayment()
    {
        if($this->recurringInterval == 1)
        {
            $currentDayOfWeek = (int) (new DateTime())->format('N'); //different letters for format can be used to get different information about the date - details - https://www.php.net/manual/en/datetime.format.php
            $nextPaymentDay = $currentDayOfWeek - $this->weeklyDay;
            if($nextPaymentDay < 0)
            {
                $nextPaymentDay += 7;
            }
            $nextPaymentDate = (new DateTime())->add(new DateInterval("P{$nextPaymentDay}D"));
            return $nextPaymentDate->format('Y-m-d');
        }   
        else if($this->recurringInterval == 2)
        {
            $currentDayOfMonth = (int) (new DateTime())->format('j');
            $nextPaymentDay = $this->monthlyDay - $currentDayOfMonth;
            if($nextPaymentDay < 0)
            {
                $nextPaymentDay += (int) (new DateTime())->format('t');
            }
            $nextPaymentDate = (new DateTime())->add(new DateInterval("P{$nextPaymentDay}D"));
            return $nextPaymentDate->format('Y-m-d');
        }
        else 
        {
            return "not recurring";
        }
    }
}

?>