<?php

//this is used to grant access to the database using a pdo
$dbName = "pennywatch";
$username = "root";
$password = "coolDB24";

$pdo = new PDO("mysql:host=localhost;dbname=$dbName",
                                          $username,
                                          $password,
                                          [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>