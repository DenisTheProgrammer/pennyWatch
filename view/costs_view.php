<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/navBar.css">
    </head>
    <body>
        <div class = "navBar">
            <a href = "../view/dashboard_view.php">Dashboard</a>
            <a href = "../view/income_view.php">Income</a>
            <a class = "active" href = "../view/costs_view.php"> Costs</a>
            <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">
                <button type="submit" class="manageButton" name = "manageAccount">
                    <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                    Manage Account
                </button>
            </form><!-- purpose of this is to take to a manage account page-->
        </div>
    </body>
</html>