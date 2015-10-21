  <?php
  include("../config.php");
        $conn = new mysqli($hostname, $usename, $password, $database);
$sql = "DELETE FROM Items WHERE id='" . $_GET["item"] . "'";
$conn->query($sql);
$conn->close(); 
header("Location: store.php");
?>