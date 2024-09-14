window.onload = function() 
{
    handleDetails();
    checkTandC();
    passwordVisibility()
}

function handleDetails()
{
    let form = document.forms["signUpForm"];

    form.addEventListener("submit", function(event)
    {
        let email = form.elements["email"].value.trim();
        let password = form.elements["password"].value.trim();
        let confirmPassword = form.elements["confirmPassword"].value.trim();
        let title = form.elements["title"].value.trim();
        let firstName = form.elements["firstName"].value.trim();
        let surname = form.elements["surname"].value.trim();
        let dob = form.elements["dob"].value.trim();
        let country = form.elements["country"].value.trim();
        let streetNo = form.elements["streetNo"].value.trim();
        let streetName = form.elements["streetName"].value.trim();
        let postcode = form.elements["postcode"].value.trim();
        let phoneNo = form.elements["phoneNo"].value.trim();

        //had a problem with the code where it looked like it was working twice, turns out with event 
        //listeners if you just make sure you load the page then run the functions you do not need on click calls on buttons

        //the on click actually makes the function run but makes it run once more for each added click of the button

        if(email === "")
        {
            alert("Please enter an email");
            event.preventDefault();//prevents form from submitting
        }

        if(password === "")
        {
            alert("Please enter a password");
            event.preventDefault();
        }

        if(confirmPassword === "")
        {
            alert("Please confirm your password");
            event.preventDefault();
        }

        if(title === "")
        {
            alert("Please enter a title");
            event.preventDefault();
        }

        if(firstName === "")
        {
            alert("Please enter a first name");
            event.preventDefault();
        }

        if(surname === "")
        {
            alert("Please enter a surname");
            event.preventDefault();
        }

        if(dob == "")
        {
            alert("Please select a date");
            event.preventDefault();
        }

        if(country === "")
        {
            alert("Please select a country");
            event.preventDefault();
        }

        if(streetNo === "")
        {
            alert("Please enter a street number");
            event.preventDefault();
        }

        if(streetName === "")
        {
            alert("Please enter a street name");
            event.preventDefault();
        }

        if(postcode === "")
        {
            alert("Please enter a postcode");
            event.preventDefault();
        }

        if(phoneNo == "")
        {
            alert("Please enter a phone number");
            event.preventDefault();
        }

        if(password != confirmPassword)
        {
            alert("Passwords do not match");
            event.preventDefault();
        }

    });
}

function passwordVisibility()
{
    let passwordField = document.getElementById("password");
    let passwordCheck = document.getElementById("showPassword");

    let confirmPasswordField = document.getElementById("confirmPassword");
    let confirmPasswordCheck = document.getElementById("showConfirm");

    passwordCheck.addEventListener("change",function()
    {
        if(passwordCheck.checked)
        {
            passwordField.type = "text";
        }
        else
        {
            passwordField.type = "password";
        }
    });

    confirmPasswordCheck.addEventListener("change", function()
    {
        if(confirmPasswordCheck.checked)
        {
            confirmPasswordField.type = "text";
        }
        else
        {
            confirmPasswordField.type = "password";
        }
    });
}

function checkTandC()
{
    let form = document.forms["signUpForm"];
     form.addEventListener("submit",function(event)
    {
        let checkTandC = form.elements["toc"];
        if(!checkTandC.checked)
        {
            alert("Please agree to the terms and conditions");
            event.preventDefault();
        }
    });
}