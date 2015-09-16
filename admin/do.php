<?php
if (isset($_POST["sync"]))
{
   include("functions/checkLogin.php");
include("functions/" . $_POST["sync"] . ".php"); 
} else {
include("functions/checkLogin.php");
include("functions/" . $_GET["value"] . ".php");
}
?>