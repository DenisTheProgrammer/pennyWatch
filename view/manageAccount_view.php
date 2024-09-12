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


        <div class="forms">
            <div class="forms-buttons">
                <button class="openSignIn" onclick="openSignIn()">Modify Sign In</button>
                <button class="openDetails" onclick="openDetails()">Modify Details</button>
            </div>

            <div class="signInPopUp" id="signInPopUp">
                <div class="form">
                    <div id="formTitle">
                        <h1>Modify Sign In</h1>
                    </div>
                    <div id="details">
                        <form method="post" action="../controller/logIn_controller.php" class="signInDetails">
                            <label for="username"><b>Username</b></label>
                            <input type="text" placeholder="Enter Email" name="username" id = "username">

                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" id = "password">
                            <div id = "bottomButtons">
                                <button type="submit" class="confirmSignIn">Confirm Change</button>
                                <button type="button" class="cancelButton" onclick="closeSignIn()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="openDetailsPopUp" id="openDetailsPopUp">
                <div class="form">
                    <div id="formTitle">
                        <h1>Modify Details</h1>
                    </div>
                    <div id="details">
                        <form method="post" action="../controller/logIn_controller.php" class="signInDetails">
                            <label for="title"><b>Title</b></label>
                            <input type="text" placeholder="" name="title" id = "title">

                            <label for="firstName"><b>First Name</b></label>
                            <input type="text" placeholder="" name="firstName" id = "firstName">

                            <label for="surname">Surname</label>
                            <input type="text" placeholder="" name = "surname" id = "surname">

                            <label for="dob">Date of Birth</label>
                            <input type="date" placeholder="" name = "dob" id="dob">

                            <label for="country">Country</label>
                            <input type="text" placeholder="" name = "country" id = "country">

                            <label for="streetNo">Street Number</label>
                            <input type="text" placeholder="" name="streetNo" id = "streetNo">

                            <label for="streetName">Street Name</label>
                            <input type="text" placeholder="" name="streetName" id = "streetName">

                            <label for="postcode">Postcode</label>
                            <input type="text" placeholder="" name="postcode" id = "postcode">

                            <label for="phoneNo">Phone Number</label>
                            <input type="text" placeholder="" name="phoneNo" id = "phoneNo">
                            <div id = "bottomButtons">
                                <button type="submit" class="confirmSignIn">Confirm Change</button>
                                <button type="button" class="cancelButton" onclick="closeDetails()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>