window.onload = function() 
{
    handleInput();
}

function handleInput()
{
    let form = document.forms["signInForm"];

    form.addEventListener("submit",function(event)
    {
        let username = document.forms["signInForm"]["username"].value.trim(); //form.elements["nameOfElement"].value.trim() could also be used
        let password = document.forms["signInForm"]["password"].value.trim();

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

    });
}


//here I am going to handle the checkbox so that when it is checked the password is shown
function passwordVisibility()
{
    let passwordField = document.getElementById("password");
    let passwordCheck = document.getElementById("showPassword");

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
}
//end of checkbox handle