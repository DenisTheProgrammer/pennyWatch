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
                        <form method="post" action="../controller/logIn_controller.php" class="signInDetails" name = "signInDetailsForm">
                            <label for="username"><b>Username</b></label>
                            <input type="text" value = <?=$username?> name="username" id = "username">

                            <label for="password"><b>Password</b></label>
                            <input type="password" value = <?=$password?> name="password" id = "password">

                            <input type="checkbox" id = "showPassword" onclick = passwordVisibility()>
                            <label for="showPassword">Show Password</label><br><br>

                            <label for="confirmPassword"><b>Confirm Password</b></label>
                            <input type="password" value = <?=$password?> name="confirmPassword" id = "confirmPassword">

                            <input type="checkbox" id = "showConfirmPassword" onclick = passwordVisibility()>
                            <label for="showConfirmPassword">Show Password</label><br><br>

                            <div id = "bottomButtons">
                                <button type="submit" class="confirmSignIn" name = "confirmSignIn">Confirm Change</button>
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
                        <form method="post" action="../controller/logIn_controller.php" class="signInDetails" name = "customerDetailsForm">
                            <label for="title"><b>Title</b></label>
                            <input type="text" value = "<?=$title?>" name="title" id = "title">

                            <label for="firstName"><b>First Name</b></label>
                            <input type="text" value = "<?=$firstName?>" name="firstName" id = "firstName">

                            <label for="surname">Surname</label>
                            <input type="text" value = "<?=$surname?>" name = "surname" id = "surname">

                            <label for="dob">Date of Birth</label>
                            <input type="date" value = "<?=$dob?>" name = "dob" id="dob">

                            <label for="country">Country</label>
                            <input type="text" value = "<?=$country?>" name = "country" id = "country">

                            <label for="streetNo">Street Number</label>
                            <input type="text" value = "<?=$streetNo?>" name="streetNo" id = "streetNo">

                            <label for="streetName">Street Name</label>
                            <input type="text" value = "<?=$streetName?>" name="streetName" id = "streetName">

                            <label for="postcode">Postcode</label>
                            <input type="text" value = "<?=$postcode?>" name="postcode" id = "postcode">

                            <label for="phoneNo">Phone Number</label>
                            <input type="text" value = "<?=$phoneNo?>" name="phoneNo" id = "phoneNo">
                            <div id = "bottomButtons">
                                <button type="submit" class="confirmDetails" name = "confirmDetailsModify">Confirm Change</button>
                                <button type="button" class="cancelButton" onclick="closeDetails()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>