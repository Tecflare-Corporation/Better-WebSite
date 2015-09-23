<?php
error_reporting(0);
include("config.php");
$conn = new mysqli($hostname, $usename, $password, $database);
$iptocheck = $_SERVER['REMOTE_ADDR'];
if ($conn->connect_error) die();
$query = mysqli_query($conn,"SELECT * FROM `Blockedips` WHERE blocked = '" . $iptocheck . "'");
if(mysqli_num_rows($query) > 0){
    header("Location: read.php?error=403");
}

?>