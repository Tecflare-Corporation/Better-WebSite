<?php
include("config.php");
$conn = new mysqli($hostname, $usename, $password, $database);
// sql to create table
$sql = "INSERT INTO Comments (id, name, about) VALUES ('" .rand(1,3491) . "', '".$_POST["name"] . "','" . $_POST["comment"]."')";
$conn->query($sql);
$conn->close();
header("Location: blog.php");
?>