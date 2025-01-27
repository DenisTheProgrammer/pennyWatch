<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/manageAccount_style.css">

        <script src = "../javascript/manageAccount_script.js"></script>

        <script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script>
        <script src = "../javascript/handlePlaidBank_script.js"></script>
    </head>

    <body>
        <div class = "topSection">
            <form method = "post" action = "../controller/dashboard_controller.php" id = "form">
                <button type="submit" class="backButton" name = "backButton">
                    <img src = "../images/backButton.png" id = "backImage" alt = "back button">
                </button>
            </form>

            <h1 id = "title">Manage Account</h1>
        </div>


        <div class="container">
        <!-- Left Sidebar -->
        <div class="navBar">
            <button class="navButton" onclick="showForm('signInPopUp')">Modify Sign In</button>
            <button class="navButton" onclick="showForm('openDetailsPopUp')">Modify Details</button>
            <button class="navButton" onclick="showForm('linksPopUp')">Links</button>
            <form method="post" class = "navLogButton" action="../controller/logIn_controller.php" name = "logOutForm">
                <button type="submit" class="logOut" name="logOut">Log Out</button>
            </form>
        </div>

        <!-- Right Content Area -->
        <div class="contentArea">
            <!-- Sign In Form -->
            <div class="signInPopUp" id="signInPopUp">
                <div class="form">
                    <h1>Modify Sign In</h1>
                    <form method="post" action="../controller/logIn_controller.php" class="signInDetails" name="signInDetailsForm">
                        <label for="username">Username</label>
                        <input type="text" value="<?=$username?>" name="username" id="username">

                        <label for="password">Password</label>
                        <input type="password" value="<?=$password?>" name="password" id="password">

                        <label for="showPassword">Show Password</label>
                        <input type="checkbox" id="showPassword" onclick="passwordVisibility()"><br><br>

                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" value="<?=$password?>" name="confirmPassword" id="confirmPassword">

                        <label for="showConfirmPassword">Show Password</label>
                        <input type="checkbox" id="showConfirmPassword" onclick="passwordVisibility()"><br><br>

                        <div id="bottomButtons">
                            <button type="submit" class="confirmSignIn" name="confirmSignIn">Confirm Change</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modify Details Form -->
            <div class="openDetailsPopUp" id="openDetailsPopUp">
                <div class="form">
                    <h1>Modify Details</h1>
                    <form method="post" action="../controller/logIn_controller.php" class = "customerDetails" name="customerDetailsForm">
                        <label for="title">Title</label>
                        <input type="text" value="<?=$title?>" name="title" id="title">

                        <label for="firstName">First Name</label>
                        <input type="text" value="<?=$firstName?>" name="firstName" id="firstName">

                        <label for="surname">Surname</label>
                        <input type="text" value="<?=$surname?>" name="surname" id="surname">

                        <label for="dob">Date of Birth</label>
                        <input type="date" value="<?=$dob?>" name="dob" id="dob">

                        <label for="country">Country</label>
                        <input type="text" value="<?=$country?>" name="country" id="country">

                        <label for="streetNo">Street Number</label>
                        <input type="text" value="<?=$streetNo?>" name="streetNo" id="streetNo">

                        <label for="streetName">Street Name</label>
                        <input type="text" value="<?=$streetName?>" name="streetName" id="streetName">

                        <label for="postcode">Postcode</label>
                        <input type="text" value="<?=$postcode?>" name="postcode" id="postcode">

                        <label for="phoneNo">Phone Number</label>
                        <input type="text" value="<?=$phoneNo?>" name="phoneNo" id="phoneNo">

                        <div id="bottomButtons">
                            <button type="submit" class="confirmDetails" name="confirmDetailsModify">Confirm Change</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Links -->
            <div class = "linksPopUp" id = "linksPopUp">
                <div class = "form">
                    <h1>Links</h1>
                    <p>This is where you can link your bank account to your pennywatch account to auto fill your information!</p>
                    <p>Link Bank</p>
                    <button id = "link">Link Now</button>
                </div>
            </div>
        </div>
    </body>
</html>