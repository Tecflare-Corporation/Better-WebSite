<?php
include("functions/checkLogin.php");
include("../config.php");
$conn = new mysqli($hostname, $usename, $password, $database);
// sql to create table
$sql = "INSERT INTO Pages (id, name, value) VALUES ('" .rand(1,3491) . "', '".$_POST["name"] . "','" . $_POST["content"]."')";
$conn->query($sql);
$conn->close();
header("Location: pages.php");
?>