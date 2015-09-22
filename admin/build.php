<?php
include("../config.php");
$conn = new mysqli($hostname, $usename, $password, $database);
// sql to create table
$sql = "INSERT INTO Posts (id, name, author, value) VALUES ('" .rand(1,3491) . "', '".$_POST["name"] . "','Administrators','" . $_POST["content"]."')";
$conn->query($sql);
$conn->close();
header("Location: post.php");
?>