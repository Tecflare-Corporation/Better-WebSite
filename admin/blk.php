<?php
include("../config.php");
$sql = "INSERT INTO Blockedips (id, blocked, value) VALUES ('" . rand(1000,9999) . "','" . $_POST["blkip"] . "','" . $_POST["blkiptext"] . "')";
$conn = new mysqli($hostname, $usename, $password, $database);
$conn->query($sql);
$conn->close();
header("Location: ipblock.php?error=1");
?>