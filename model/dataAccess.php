<?php

//this is used to grant access to the database using a pdo
$dbName = "pennywatch";
$username = "root";
$password = "coolDB24";

$pdo = new PDO("mysql:host=localhost;dbname=$dbName",
                                          $username,
                                          $password,
                                          [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


//these are functions for the login database
function registerLogIn($logIn)
{
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO login (username, password) VALUES(?,?)");
    $statement->execute([$logIn->username, $logIn->password]);
}

function getUserLogIn($username, $password)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM login WHERE username =? AND password =? LIMIT 1"); //limit 1 ensures only one match is returned
    $statement->execute([$username, $password]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "LogIn");
}

function getUserLogInByID($logInId)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM login WHERE logInId =?");
    $statement->execute([$logInId]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "LogIn");
}

function modifyLogIn($logIn, $logInID)
{
    global $pdo;
    $statement = $pdo->prepare("UPDATE login SET username = ?, password = ? WHERE logInId = ?");
    $statement->execute([$logIn->username, $logIn->password, $logInID]);
}

//these are functions for the customerdetails database
function registerDetails($details, $logInId)
{
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO customerdetails (title,firstName,surname,dob,country,streetNumber,streetName,postcode,phoneNumber,logInId) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $statement->execute([$details->title, $details->firstName, $details->surname, $details->dob, $details->country, $details->streetNumber, $details->streetName, $details->postcode, $details->phoneNumber, $logInId]);
}

function getDetailsByLogInId($logInId)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM customerdetails WHERE logInID =?");
    $statement->execute([$logInId]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Customer");
}

function modifyDetails($customer, $logInId)
{
    global $pdo;
    $statement = $pdo->prepare("UPDATE customerdetails SET title =?, firstName =?, surname =?, dob =?, country =?, streetNumber =?, streetName =?, postcode =?, phoneNumber =? WHERE logInId =?");
    $statement->execute([$customer->title, $customer->firstName, $customer->surname, $customer->dob, $customer->country, $customer->streetNumber, $customer->streetName, $customer->postcode, $customer->phoneNumber, $logInId]);
}
?>