<?php
  include("functions/checkLogin.php");
  include("../config.php");
        $conn = new mysqli($hostname, $usename, $password, $database);
$sql = "DELETE FROM Storage WHERE id='" . $_GET["file"] . "'";
$conn->query($sql);
$conn->close(); 
header("Location: cloudfile.php");
?>