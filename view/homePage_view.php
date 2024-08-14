<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href ="../css/homePage_style.css">
    </head>

    <body>
        <div class = "frontPage">
            <div id = "logo">
                <p> <img src="../images/logo.png" class = "logo"></p>
            </div>

            <div id = "slogan">
                <p> Welcome to Penny Watch, the place where every penny counts and every goal is within reach!</p>
            </div>

            <div id = "bottomButtons">
                <form method = "post" action = "../controller/logIn_controller.php">
                    <input type = "submit" value = "Log In" name = "logIn" class = "button">
                </form>

                <form method = "post" action = "../controller/signUp_controller.php">
                    <input type = "submit" value = "Sign Up" name = "signUp" class = "button">
                </form>
            </div>
        </div>
    </body>
</html>