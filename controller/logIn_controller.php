<?php
require_once "../model/dataAccess.php";
require_once "../model/logIn.php";
require_once "../model/customer.php";
session_start();

//this displays the sign up page when the register button is clicked
if (isset($_REQUEST["register"]))
{
    require_once "../view/signUp_view.php";
}

//this deals with registering a new user
if(isset($_REQUEST["confirmDetails"]))
{
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

//this deals with logging the user in
if(isset($_REQUEST["logIn"]))
{
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $logged = getUserLogIn($username,$password);

    if(!isset($logged) || $logged == null)
    {
        require_once "../view/logIn_view.php";
    }
    else
    {   
        $_SESSION["loggedUser"] = $logged;
        require_once "../view/dashboard_view.php";
    }
}

//this takes the user back to the dashboard from the manage account view
if(isset($_REQUEST["backButton"]))
{
    require_once "../view/dashboard_view.php";
}

//this takes all the deatils needed for autofill, preparing everything needed for the manage account view
if(isset($_REQUEST["manageAccount"]))
{
    $loggedUser = $_SESSION["loggedUser"];
    $username = $loggedUser[0]->username;
    $password = $loggedUser[0]->password;
    $customerDetails = getDetailsByLogInId($loggedUser[0]->logInID);
    $title = $customerDetails[0]->title;
    $firstName = $customerDetails[0]->firstName;
    $surname = $customerDetails[0]->surname;
    $dob = $customerDetails[0]->dob;
    $country = $customerDetails[0]->country;
    $streetNo = $customerDetails[0]->streetNumber;
    $streetName = $customerDetails[0]->streetName;
    $postcode = $customerDetails[0]->postcode;
    $phoneNo = $customerDetails[0]->phoneNumber;
    require_once "../view/manageAccount_view.php";
}

//this modifies the log in details of the user through the manage account page
if(isset($_REQUEST["confirmSignIn"]))
{
    $loggedUser = $_SESSION["loggedUser"];
    $logIn = new LogIn;
    $logIn->username = $_REQUEST["username"];
    $logIn->password = $_REQUEST["password"];
    modifyLogIn($logIn, $loggedUser[0]->logInID);
    $logged = getUserLogInByID($loggedUser[0]->logInID);
    $_SESSION["loggedUser"] = $logged;
    require_once "../view/dashboard_view.php";
}

//this modifies the details of the logged in user through the manage account page
if(isset($_REQUEST["confirmDetailsModify"]))
{
    $loggedUser = $_SESSION["loggedUser"];
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
    modifyDetails($customer, $loggedUser[0]->logInID);
    require_once "../view/dashboard_view.php";
}
?>