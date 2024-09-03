<?php
require_once "../model/dataAccess.php";
require_once "../model/logIn.php";
require_once "../model/customer.php";

if (isset($_REQUEST["register"]))
{
    require_once "../view/signUp_view.php";
}

if(isset($_REQUEST["confirmDetails"]))
{
    //do the sign up
    $logIn = new LogIn;
    $logIn->username = $_REQUEST["email"];
    $logIn->password = $_REQUEST["password"];

    registerLogIn($logIn);
    $logged = getUserLogIn($logIn->username, $logIn->password);

    $customer = new Customer;
    $customer->title = $_REQUEST["title"];
    $customer->firstName = $_REQUEST["firstName"];
    $customer->surname = $_REQUEST["surname"];
    $customer->dob = $_REQUEST["dob"];
    $customer->country = $_REQUEST["country"];
    $customer->streetNumber = $_REQUEST["streetNo"];
    $customer->streetName = $_REQUEST["streetName"];
    $customer->postcode = $_REQUEST["postcode"];
    $customer->phoneNumber = $_REQUEST["phoneNo"];

    registerDetails($customer, $logged[0]->logInID);

    require_once "../view/logIn_view.php";
}

if(isset($_REQUEST["logIn"]))
{
    //do the log in logic
    require_once "../view/dashboard_view.php";
}
?>