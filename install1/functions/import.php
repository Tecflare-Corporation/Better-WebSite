<?php
error_reporting(0);
$mysqli = new mysqli($_POST["hostname"],$_POST["usename"],$_POST["password"], $_POST["database"]);

/* check connection */
if ($mysqli->connect_erno) {
    header("Location: index.php?page=2&error=1");
    exit();
}

/* check if server is alive */
if ($mysqli->ping()) {
    $content = '
<?php
$hostname = "' . $mysqli->real_escape_string($_POST["hostname"]).'";
$usename = "' . $mysqli->real_escape_string($_POST["usename"]).'";
$password = "' . $mysqli->real_escape_string($_POST["password"]).'";
$database = "' . $mysqli->real_escape_string($_POST["database"]).'";
$version = "4";
?>
';
file_put_contents("../config.php",$content);
    header("Location: index.php?page=3");
} else {
    header("Location: index.php?page=2&error=1");
}

/* close connection */
$mysqli->close();
?>