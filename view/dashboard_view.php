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
                <input type="submit" value = "Manage Account" name = "backButton" class = "manageButton">
            </form><!-- purpose of this is to take to a manage account page-->
        </div>
    </body>
</html>