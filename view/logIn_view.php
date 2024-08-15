<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/logIn_style.css">
    </head>

    <body>
        <div class = "form">
            <div id = "formTitle">
                <h1>Log In</h1>
            </div>
            <div id = "details">
                <form method = "post" action="logIn_controller.php">
                    <label for="username">Username (Email)</label><br>
                    <input type="text" id = "username" name = "username"><br><br>
                    <label for="password">Password</label><br>
                    <input type="password" id = "password" name = "password"><br><br>
                    <div id = "bottomButtons">
                        <input type= "submit" value = "Log In" name = "logIn" class = "button"><br><br>
                        <input type="submit" value = "Register" name = "register" class = "button"><br><br>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>