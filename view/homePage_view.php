<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href ="../css/homePage_style.css">
    </head>

    <body>
        <div class = "frontPage">
            <div id = "logo">
                <p> LOGO GOES HERE</p>
            </div>

            <div id = "slogan">
                <p> Welcome to Penny Watch, the place where every penny counts and every goal is within reach!</p>
            </div>

            <div id = "bottomButtons">
                <form method = "post" action = "../controller/homePage_controller.php">
                    <input type = "submit" value = "Log In" name = "logIn" class = "button">
                </form>

                <form method = "post" action = "../controller/homePage_controller.php">
                    <input type = "submit" value = "Sign Up" name = "signUp" class = "button">
                </form>
            </div>
        </div>
    </body>
</html>