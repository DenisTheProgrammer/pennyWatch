document.addEventListener("DOMContentLoaded", () => {
    showForm('signInPopUp'); // Show the first form by default
    handleDetails();
    handleSignIn();
    confirmLogOut();
  });

function confirmLogOut()
{
  let form = document.forms["logOutForm"];
  form.addEventListener("submit", function(event)
  {
    let logOut = confirm("Are you sure you want to log out?");
    if(!logOut)
    {
       event.preventDefault();
    }
  });
}

function showForm(formId) {
  const forms = document.querySelectorAll(".contentArea > div");
  forms.forEach((form) => {
      form.style.display = "none"; // Hide all forms
  });
  document.getElementById(formId).style.display = "block"; // Show the selected form
}

function passwordVisibility() {
  let passwordField = document.getElementById("password");
  let passwordCheck = document.getElementById("showPassword");

  let confirmPasswordField = document.getElementById("confirmPassword");
  let confirmPasswordCheck = document.getElementById("showConfirmPassword");

  passwordField.type = passwordCheck.checked ? "text" : "password";
  confirmPasswordField.type = confirmPasswordCheck.checked ? "text" : "password";
}

function handleDetails()
{
    let form = document.forms["customerDetailsForm"];

    form.addEventListener("submit", function(event)
    {
        let title = form.elements["title"].value.trim();
        let firstName = form.elements["firstName"].value.trim();
        let surname = form.elements["surname"].value.trim();
        let dob = form.elements["dob"].value.trim();
        let country = form.elements["country"].value.trim();
        let streetNo = form.elements["streetNo"].value.trim();
        let streetName = form.elements["streetName"].value.trim();
        let postcode = form.elements["postcode"].value.trim();
        let phoneNo = form.elements["phoneNo"].value.trim();

        if(title === "")
        {
            alert("Please enter a title");
            event.preventDefault();
        }
        else if(firstName === "")
        {
            alert("Please enter a first name");
            event.preventDefault();
        }
        else if(surname === "")
        {
            alert("Please enter a surname");
            event.preventDefault();
        }
        else if(dob == "")
        {
            alert("Please select a date");
            event.preventDefault();
        }
        else if(country === "")
        {
            alert("Please select a country");
            event.preventDefault();
        }
        else if(streetNo === "")
        {
            alert("Please enter a street number");
            event.preventDefault();
        }
        else if(streetName === "")
        {
            alert("Please enter a street name");
            event.preventDefault();
        }
        else if(postcode === "")
        {
            alert("Please enter a postcode");
            event.preventDefault();
        }
        else if(phoneNo == "")
        {
            alert("Please enter a phone number");
            event.preventDefault();
        }

    });
}

function handleSignIn()
{
  let form = document.forms["signInDetailsForm"];

    form.addEventListener("submit",function(event)
    {
        let username = form.elements["username"].value.trim();
        let password = form.elements["password"].value.trim();
        let confirmPassword = form.elements["confirmPassword"].value.trim();

        if(username === "")
        {
            alert("Please enter a valid username");
            event.preventDefault();//prevents the form from submitting - default is to submit
        }

        if(password === "")
        {
            alert("Please enter a valid password");
            event.preventDefault();
        }

        if(confirmPassword != password)
        {
            alert("Passwords do not match");
            event.preventDefault();
        }

    });
}
