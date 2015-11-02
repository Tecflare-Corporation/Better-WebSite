<?php
include("functions/checkLogin.php");
include("../config.php");
include("engine/functions.php");
$blog = new blog;
$blog->remove_post("Test");
?>