<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/navBar.css">
    </head>
    <body>
        <div class = "navBar">
            <a class = "active" href = "../view/dashboard_view.php">Dashboard</a>
            <a href = "#income">Income</a>
            <a href = "#cost"> Costs</a>
            <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">

            <button type="submit" class="manageButton">
                <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                Manage Account
            </button>

                <!--<input type="submit" img src = "../images/profile.png" value = "Manage Account" name = "backButton" class = "manageButton">-->
            </form><!-- purpose of this is to take to a manage account page-->
        </div>
    </body>
</html>