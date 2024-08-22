function handleDetails()
{
    var form = document.forms["signUpForm"];

    form.addEventListener("submit", function(event)
    {
        var email = form.elements["email"].value.trim();
        var password = form.elements["password"].value.trim();
        var confirmPassword = form.elements["confirmPassword"].value.trim();
        var title = form.elements["title"].value.trim();
        var firstName = form.elements["firstName"].value.trim();
        var surname = form.elements["surname"].value.trim();
        var dob = form.elements["dob"].value.trim();
        var country = form.elements["country"].value.trim();
        var streetNo = form.elements["streetNo"].value.trim();
        var streetName = form.elements["streetName"].value.trim();
        var postcode = form.elements["postcode"].value.trim();
        var phoneNo = form.elements["phoneNo"].value.trim();

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
            alert("Please enter a firstName");
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
            alert("Please enter a street number");
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
    });
}