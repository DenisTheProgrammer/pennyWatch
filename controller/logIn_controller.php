<?php
if (isset($_REQUEST["register"]))
{
    require_once "../view/signUp_view.php";
}

if(isset($_REQUEST["confirmDetails"]))
{
    //do the sign up
    require_once "../view/dashboard_view.php";
}

if(isset($_REQUEST["logIn"]))
{
    //do the log in logic
    require_once "../view/dashboard_view.php";
}
?>