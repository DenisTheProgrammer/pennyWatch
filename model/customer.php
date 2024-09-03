<?php
Class customer
{
    private $customerID;
    private $title;
    private $firstName;
    private $surname;
    private $dob;
    private $country;
    private $streetNumber;
    private $streetName;
    private $postcode;
    private $phoneNumber;

    // getters and setters

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