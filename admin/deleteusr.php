  <?php
  include("functions/checkLogin.php");
include("../config.php");
        $conn = new mysqli($hostname, $usename, $password, $database);
$sql = "DELETE FROM Administrators WHERE id='" . $_GET["usr"] . "'";
$conn->query($sql);
$conn->close(); 
header("Location: users.php");
?>