<?php
include("functions/checkLogin.php");
unlink("../memory");
mkdir("../memory");
header("Location: settings.php");
?>