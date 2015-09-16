<?php
include ("../config.php");
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql = 'update Settings set code="title", value="' . $_POST["title"] .'" where id=1';
mysqli_query($con,$sql);
$sql = 'update Settings set code="maintainanceMode", value="' . $_POST["mmode"] .'" where id=2';
mysqli_query($con,$sql);
$sql = 'update Settings set code="welcomemsg", value="' . $_POST["content"] .'" where id=3';
mysqli_query($con,$sql);
mysqli_close($con);
header("Location: settings.php?error=1");
?>