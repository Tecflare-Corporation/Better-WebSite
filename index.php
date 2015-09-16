<?php
include("checkblk.php");
if (!file_exists("config.php"))
{
//do the installer
header("Location: install/");
} else {
//continue to site
header("Location: startupScript.php");
}
?>