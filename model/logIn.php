<?php
Class LogIn
{
    private $logInId;
    private $username;
    private $password;
    private $access;

    //getters and setters

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name,$value)
    {
        $this->$name = $value;
    }
}
?>