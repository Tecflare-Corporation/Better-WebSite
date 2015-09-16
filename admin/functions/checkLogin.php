<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["usename"]))
{
    header("Location: index.php");
}
?>