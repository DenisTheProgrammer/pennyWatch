<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/dashboard_style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/navBar.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/charts_style.css">

        <script src="../javascript/dashboardGraphs_script.js"></script>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </head>
    <body>
        <div class = "navBar"> <!--ask Paul whether he is happy with the a tags-->
            <a class = "active" href = "../controller/dashboard_controller.php">Dashboard</a>
            <a href = "../controller/breakdown_controller.php">Breakdown</a>
            <a href = "../controller/incomes_controller.php">Incomes</a>
            <a href = "../controller/costs_controller.php"> Costs</a>
            <a href = "../controller/savings_controller.php"> Savings</a>
            <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">
                <button type="submit" class="manageButton" name = "manageAccount">
                    <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                    Manage Account
                </button>
            </form><!-- purpose of this is to take to a manage account page-->
        </div>

        <div class = "charts">
            <div id="pieChartContainer"></div> <!-- this displays the chart -->
            <div id="columnChartContainer"></div>
        </div>

        <p id="conclusionText">Your disposable income this month is: £<?= $disposableIncome; ?></p>
        <p id="message"><?= $message; ?></p>

    </body>
</html>