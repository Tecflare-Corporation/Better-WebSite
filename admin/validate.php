<?php
session_start();
error_reporting(0);
include("../config.php");
$conn = new mysqli($hostname, $usename, $password, $database);
if ($conn->connect_error) die();
$usename = addslashes($_POST['usename']);
$password = addslashes($_POST["password"]);
$query = mysqli_query($conn,"SELECT * FROM `Administrators` WHERE usename = '" . $usename . "' AND password='".  md5($password) . "'");
if(mysqli_num_rows($query) > 0){
    if (file_exists("../install"))
    {
        header("Location: index.php?error=2");
        die();
    }
$_SESSION["usename"] = $usename;
header("Location: cp.php");
}else{
    header("Location: index.php?error=1");
}
?>
