<?php

if(!isset($_REQUEST["logIn"])&&!isset($_REQUEST["signUp"]))
{
    require_once "../view/homePage_view.php";
}
else if(isset($_REQUEST["logIn"]))
{
    require_once "../view/logIn_view.php";
}
else if(isset($_REQUEST["signUp"]))
{
    require_once "../view/signUp_view.php";
}

?>