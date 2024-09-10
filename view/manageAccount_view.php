<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/manageAccount_style.css">
        <script src = "../javascript/manageAccount_script.js"></script>
    </head>

    <body>
        <div class = "topSection">
            <form method = "post" action = "../controller/logIn_controller.php" id = "form">
                <button type="submit" class="backButton" name = "backButton">
                    <img src = "../images/backButton.png" id = "backImage" alt = "back button">
                </button>
            </form>

            <h1 id = "title">Manage Account</h1>
        </div>

        <div class = "forms">
            <button class="openSignIn" onclick="openForm()">Modify Sign In</button>

            <div class="signInPopUp" id="signInPopUp">
                <div class = "form">
                    <div id = "formTitle">
                        <h1>Modify Sign In</h1>
                    </div>
                    <div id = "details">
                        <form method = "post" action="../controller/logIn_controller.php" class="signInDetails">
                            <label for="username"><b>Username</b></label>
                            <input type="text" placeholder="Enter Email" name="username" id = "username">

                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" id = "password">
                            <div id = "bottomButtons">
                                <button type="submit" class="confirmSignIn">Confirm Change</button>
                                <button type="button" class="cancelButton" onclick="closeForm()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <button class="openDetails" onclick="openDetails()">Modify Details</button>
        </div>
    </body>
</html>