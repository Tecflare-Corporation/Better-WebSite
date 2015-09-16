<?php
include("functions/checkLogin.php");
include("functions/getfile.php");
include("functions/head.php");
echo get_Secure_File($_GET["value"]);
include("functions/footer.php");
?>