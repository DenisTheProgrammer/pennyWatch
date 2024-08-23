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
    return $statement->fetchAll(PDO::FETCH_CLASS, "login");
}

//these are functions for the customerdetails database
function registerDetails($details)
{
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO customerdetails (title,firstName,surname,dob,country,streetNumber,streetName,postcode,phoneNumber,logInId) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $statement->execute([$details->title, $details->firstName, $details->surname, $details->dob, $details->country, $details->streetNumber, $details->streetName, $details->postcode, $details->phoneNumber, $details->logInId]);
}
?>