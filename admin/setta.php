<?php
include("functions/checkLogin.php");
$stylefile = "../styles/" . $_POST["theme"];

$a = fopen("style/bootstrapsite.theme.css", 'w');
fwrite($a, file_get_contents($stylefile));
fclose($a);
$a = fopen("style/bootstrap.theme.css", 'w');
fwrite($a, file_get_contents($stylefile));
fclose($a);
header("Location: theme.php");
?>