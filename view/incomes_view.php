<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/navBar.css">
    </head>
    <body>
        <div class = "navBar">
            <a href = "../controller/dashboard_controller.php">Dashboard</a>
            <a class = "active" href = "../controller/incomes_controller.php">Incomes</a>
            <a href = "../controller/costs_controller.php"> Costs</a>
            <a href = "../controller/savings_controller.php"> Savings</a>
            <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">
                <button type="submit" class="manageButton" name = "manageAccount">
                    <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                    Manage Account
                </button>
            </form><!-- purpose of this is to take to a manage account page-->
        </div>

        <div class = "incomePage">
            <div id = "incomeDisplay">
            <form method="post" action="yourActionHandler.php">
                <label for="filterCategory">Filter by Category:</label>
                <select id="filterCategory" name="filterCategory"> <!--you can add an onchange here with some javascript to submit the form when the user selects an option-->
                    <option value="All">All</option>
                    <option value="Salary">Salary</option>
                    <option value="Business">Business</option>
                    <option value="Investment">Investment</option>
                </select>

                <label for="filterMonth">Filter by Month:</label>
                <select id="filterMonth" name="filterMonth">
                    <option value="All">All</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <!-- Add more months as needed -->
                </select>

                <label for="filterYear">Filter by Year:</label>
                <select id="filterYear" name="filterYear">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>

                <button type="submit" class="button">Reset</button>
            </form>

                <table>
                    <thead>
                        <tr>
                        <th>Reference:</th>
                        <th>Amount:</th>
                        <th>Category</th>
                        <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($incomes as $income):?>
                        <tr>
                            <td><b>reference: </b><?=$income->incomeReference?></td>
                            <td><b>Amount: </b><?=$income->incomeAmount?></td>
                            <td><b>Category:</b><?=$income->category?></td>
                            <td><b>Date: </b><?=$income->date?></td>
                            <td><form method = "post" action = "cheeseController.php">
                                <input type = "submit" value = "Delete" name = "deleteButton" class = "button">
                                <input type = "hidden" value = <?=$income->incomeID?> name="IDPass">
                            </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>