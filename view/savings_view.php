<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/navBar.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/savings_style.css">
        <script src="../javascript/savings_script.js"></script>
    </head>
    <body>
        <div class = "navBar">
            <a href = "../controller/dashboard_controller.php">Dashboard</a>
            <a href = "../controller/breakdown_controller.php">Breakdown</a>
            <a href = "../controller/incomes_controller.php">Incomes</a>
            <a href = "../controller/costs_controller.php"> Costs</a>
            <a class = "active" href = "../controller/savings_controller.php"> Savings</a>
            <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">
                <button type="submit" class="manageButton" name = "manageAccount">
                    <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                    Manage Account
                </button>
            </form><!-- purpose of this is to take to a manage account page-->
        </div>

        <div class="savingsPage">
            <div id = "goalSummary">
                <table id = "goalTable">
                    <thead>
                        <tr>
                            <th>Goal Name</th>
                            <th>Target</th>
                            <th>Saved</th>
                            <th>Last Payment</th>
                            <th>Recurring Amount</th>
                            <th>Next Payment</th>
                            <th>Date Created</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($goals as $goal): ?>
                        <tr>
                            <td><?= $goal->goalName ?></td>
                            <td>£<?= $goal->goalTarget ?></td>
                            <td><?= $goal->goalAmount ?></td>
                            <td><?= $goal->displayLastPayment() ?></td>
                            <td><?= $goal->recurringAmount ?></td>
                            <td><?=$goal->calculateNextPayment()?></td>
                            <td><?= $goal->dateCreated ?></td>
                            <td>
                                <form id ="paymentForm" method="post" action="savings_controller.php" onsubmit="checkPayment()">
                                    <input type="text" name="paymentInput" id = "paymentInput" placeholder="Enter amount to pay...">
                                    <button type="submit" class="payButton" name = "payButton">
                                        <img src = "../images/addButton.png" id = "payImage" alt = "pay button">
                                    </button>
                                    <input type="hidden" value="<?= $goal->goalID ?>" name="IDPass">
                                </form>
                            </td>
                            <td>
                                <form method="post" action="savings_controller.php">
                                    <button type="submit" class="deleteButton" name = "deleteButton">
                                        <img src = "../images/deleteButton.png" id = "deleteImage" alt = "delete button">
                                    </button>
                                    <input type="hidden" value="<?= $goal->goalID ?>" name="IDPass">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div id = "addButton">
                <form method="post" action="savings_controller.php">
                    <input type="submit" value="Add Goal" name="addGoalButton" class="button">
                </form>
            </div>
        </div>
    </div>
    </body>
</html>