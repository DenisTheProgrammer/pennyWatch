<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/logInsignUpForm_style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/logIn_style.css">
        <script src="../javascript/logIn_script.js"></script>
    </head>

    <body>
        <div class = "form">
            <div id = "formTitle">
                <h1>Log In</h1>
            </div>
            <div id = "details">
                <form name = "signInForm" id = "signInForm" method = "post" action="logIn_controller.php">
                    <label for="username">Username (Email)</label><br>
                    <input type="text" id = "username" name = "username"><br><br>

                    <label for="password">Password</label><br>
                    <input type="password" id = "password" name = "password"><br><br>

                    <input type="checkbox" id = "showPassword" onclick = passwordVisibility()>
                    <label for="showPassword">Show Password</label><br><br>

                <div id = "bottomButtons">
                        <input type= "submit" value = "Log In" name = "logIn" class = "button" ><br><br>
                </form>
                <form method="post" action="logIn_controller.php">
                        <input type="submit" value = "Register" name = "register" class = "button" id = "regButton"><br><br>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>