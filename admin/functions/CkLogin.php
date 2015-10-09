<?php
include ("../config.php");
include("functions/sendmail.php");
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql = 'update Settings set id=4, value="' . $_POST["mail"] .'" where code="mail"';
mysqli_query($con,$sql);
$sql = 'update Settings set code="title", value="' . $_POST["title"] .'" where id=1';
mysqli_query($con,$sql);
$sql = 'update Settings set code="maintainanceMode", value="' . $_POST["mmode"] .'" where id=2';
mysqli_query($con,$sql);
$sql = 'update Settings set code="welcomemsg", value="' . $_POST["content"] .'" where id=3';
mysqli_query($con,$sql);
mysqli_close($con);
mysqli_close($con);
sendmessage($_POST["mail"],"Settings has been Changed","New Settings Are" . $_POST["mail"] . ", " . $_POST["title"]);
header("Location: settings.php?error=1");
?>