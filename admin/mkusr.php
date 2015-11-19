<?php
include ("../config.php");
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql = 'INSERT INTO Administrators (id, usename, password) VALUES ("' . rand(1,100000) . '","' .addslashes($_POST["usename"]) .'","' . md5(addslashes($_POST["password"])) . '")';
mysqli_query($con,$sql);
mysqli_close($con);
header("Location: users.php");
?>