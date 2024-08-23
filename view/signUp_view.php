<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
    <link rel = "stylesheet" type="text/css" href = "../css/logInsignUpForm_style.css">
    <link rel = "stylesheet" type="text/css" href = "../css/signUp_style.css">
    <script src="../javascript/signUp_script.js"></script>
</head>

<body>
    <div class = "form">
        <div id = "formTitle">
            <h1>Sign Up</h1>
        </div>
        <div id = "details">
            <form name = "signUpForm" method="post" action = "logIn_controller.php">
                <label for="email">Email</label><br>
                <input type="text" id = "email" name = "email"><br><br>

                <label for="password">Password</label><br>
                <input type="password" id = "password" name = "password"><br><br>

                <input type="checkbox" id = "showPassword" onclick = passwordVisibility()>
                <label for="showPassword">Show Password</label><br><br>

                <label for="confirmPassword">Confirm Password</label><br>
                <input type="password" id = "confirmPassword" name = "confirmPassword"><br><br>

                <input type="checkbox" id = "showConfirm" onclick = passwordVisibility()>
                <label for="showConfirm">Show Password</label><br><br>

                <label for="title">Title</label><br>
                <input type="text" id = "title" name = "title"><br><br>

                <label for="firstName">First Name</label><br>
                <input type="text" id = "firstName" name = "firstName"><br><br>

                <label for="surname">Surname</label><br>
                <input type="text" name="surname" id="surname"><br><br>

                <label for="dob">Date Of Birth</label><br>
                <input type="date" id = "dob" name = "dob"><br><br>

                <label for="country">Country</label><br>
                <input list = "countries" name = "country" id = "country"><br><br>

                <datalist id = "countries">
                    <option value="United Kingdom"></option>
                </datalist>
                <!-- more option countries can be added here as more get supported -->

                <label for="streetNo">Street Number</label><br>
                <input type="text" name = "streetNo" id = "streetNo"><br><br>

                <label for="streetName">Street Name</label><br>
                <input type="text" name = "streetName" id = "streetName"><br><br>

                <label for="postcode">Postcode</label><br>
                <input type="text" name = "postcode" id = "postcode"><br><br>

                <label for="phoneNo">Phone Number</label><br>
                <input type="number" name = "phoneNo" id = "phoneNo"><br><br>

                <input type="checkbox" id = "toc">
                <label for="toc"><strong> I Accept Terms And Conditions</strong></label><br><br>

                <input type="submit" value = "Confirm Details" name = "confirmDetails" class = "button" id = "confirmDetails">
            </form>
        </div>
    </div>
</body>

</html>