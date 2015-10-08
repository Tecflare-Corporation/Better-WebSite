<?php
include ("../config.php");
include("functions/master.php");
if(!passwordcheck($_POST["password"]))
{
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql = 'update Administrators set usename="' .addslashes($_POST["usename"]) .'", password="' . md5(addslashes($_POST["password"])) .'" where id=' . $_POST["synca"];
mysqli_query($con,$sql);
mysqli_close($con);
header("Location: account.php?error=1");
}
else {
header("Location: account.php?error=2");
}
?>