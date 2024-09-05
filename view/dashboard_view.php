<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/navBar.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/charts_style.css">
        <script src="../javascript/graphs_script.js"></script>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </head>
    <body>
        <div class = "navBar"> <!--ask Paul whether he is happy with the a tags-->
            <a class = "active" href = "../controller/dashboard_controller.php">Dashboard</a>
            <a href = "../controller/income_controller.php">Income</a>
            <a href = "../controller/costs_controller.php"> Costs</a>
            <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">
                <button type="submit" class="manageButton" name = "manageAccount">
                    <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                    Manage Account
                </button>
            </form><!-- purpose of this is to take to a manage account page-->
        </div>

        <div id="chartContainer"></div>
    </body>
</html>