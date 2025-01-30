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

//these are functions for the income database
function getAllIncomes($customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM income WHERE customerID = ?");
    $statement->execute([$customerID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Income");
}

function getIncomeCategories($customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT DISTINCT category FROM income WHERE customerID = ?");
    $statement->execute([$customerID]);
    return $statement->fetchAll(PDO::FETCH_COLUMN);
}

function getIncomesByMonth($month, $year, $customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM income WHERE YEAR(date) = ? AND MONTH(date) = ? AND customerID = ?");
    $statement->execute([$year, $month, $customerID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Income");
}

function getTotalIncomeByMonth($month, $year, $customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT SUM(incomeAmount) AS totalIncome FROM income WHERE YEAR(date) = ? AND MONTH(date) = ? AND customerID = ?");
    $statement->execute([$year, $month, $customerID]);
    $totalIncome = $statement->fetchColumn();
    return $totalIncome ?: 0; // return 0 if result is null or 0
}

function addIncome($income, $customerID)
{
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO income (incomeReference, incomeAmount, category, date, recurring, customerID) VALUES(?,?,?,?,?,?)");
    $statement->execute([$income->incomeReference, $income->incomeAmount, $income->category, $income->date, $income->recurring, $customerID]);
}

function getIncomesDynamically($conditions, $filters)
{
    global $pdo;
    $sql = "SELECT * FROM income WHERE customerID = :customer_id";
    $sql .= ' AND ' . implode(' AND ', $conditions);
    $statement = $pdo->prepare($sql);
    $statement->execute($filters);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Income");
}

function deleteIncome($incomeID)
{
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM income WHERE incomeID =?");
    $statement->execute([$incomeID]);
}


//these are functions for the cost database
function getAllCosts($customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM cost WHERE customerID = ?");
    $statement->execute([$customerID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Cost");
}

function getCostCategories($customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT DISTINCT category FROM cost WHERE customerID = ?");
    $statement->execute([$customerID]);
    return $statement->fetchAll(PDO::FETCH_COLUMN);
}


function getCostsByMonth($month, $year, $customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM cost WHERE YEAR(date) = ? AND MONTH(date) = ? AND customerID = ?");
    $statement->execute([$year, $month, $customerID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Cost");
}

function getTotalCostByMonth($month, $year, $customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT SUM(costAmount) AS totalCost FROM cost WHERE YEAR(date) = ? AND MONTH(date) = ? AND customerID = ?");
    $statement->execute([$year, $month, $customerID]);
    $totalCost = $statement->fetchColumn();
    return $totalCost ?: 0; // return 0 if result is null or 0
}

function addCost($cost, $customerID)
{
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO cost (costReference, costAmount, category, date, recurring, customerID) VALUES(?,?,?,?,?,?)");
    $statement->execute([$cost->costReference, $cost->costAmount, $cost->category, $cost->date, $cost->recurring, $customerID]);
}

function getCostsDynamically($conditions, $filters)
{
    global $pdo;
    $sql = "SELECT * FROM cost WHERE customerID = :customer_id";
    $sql .= ' AND ' . implode(' AND ', $conditions);
    $statement = $pdo->prepare($sql);
    $statement->execute($filters);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Cost");
}

function getCostByID($costID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM cost WHERE costID =?");
    $statement->execute([$costID]);
    return $statement->fetchObject("Cost");
}

function deleteCost($costID)
{
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM cost WHERE costID =?");
    $statement->execute([$costID]);
}

//these are functions for the goals database
function getGoalById($goalID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM goal WHERE goalID =?");
    $statement->execute([$goalID]);
    return $statement->fetchObject("Goal");
}

function getAllGoals($customerID)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM goal WHERE customerID = ?");
    $statement->execute([$customerID]);
    return $statement->fetchAll(PDO::FETCH_CLASS, "Goal");
}

function addNewGoalPayment($goalPayment, $paymentDate, $goalID, $goalAmount)
{
    global $pdo;
    $statement = $pdo->prepare("UPDATE goal SET lastPaymentAmount = ?, lastPaymentDate = ?, goalAmount = ? WHERE goalID = ?");
    $statement->execute([$goalPayment, $paymentDate, $goalAmount, $goalID]);
}
function deleteGoal($goalID)
{
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM goal WHERE goalID =?");
    $statement->execute([$goalID]);
}

function addGoal($goal, $customerID)
{
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO goal (goalName, goalTarget, goalAmount, recurring, recurringAmount, recurringInterval, weeklyDay, monthlyDay, customerID) VALUES(?,?,?,?,?,?,?,?,?)");
    $statement->execute([$goal->goalName,$goal->goalTarget, $goal->goalAmount,$goal->recurring, $goal->recurringAmount, $goal->recurringInterval, $goal->weeklyDay, $goal->monthlyDay, $customerID]);
}
?>