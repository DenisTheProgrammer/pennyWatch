function openSignIn() 
{
  document.getElementById("signInPopUp").style.display = "block";
}
  
function closeSignIn() 
{
  document.getElementById("signInPopUp").style.display = "none";
}

function openDetails()
{
  document.getElementById("openDetailsPopUp").style.display = "block";
}

function closeDetails()
{
  document.getElementById("openDetailsPopUp").style.display = "none";
}

function passwordVisibility() {
  let passwordField = document.getElementById("password");
  let passwordCheck = document.getElementById("showPassword");

  if (passwordCheck.checked) {
      passwordField.type = "text";
  } else {
      passwordField.type = "password";
  }
}
