<?php
if (!isset($testmode))
{
 error_reporting(0);
include("functions/master.php");
if (!isset($_POST["type"]))
{
include("functions/import.php");
die();
}
if(!passwordcheck($_POST["password"]))
{
 header("Location: index.php?page=3&error=9");
}
//create account area
include("../config.php");
$conn = new mysqli($hostname, $usename, $password, $database);
// sql to create table
 $sql = "CREATE TABLE Administrators (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
usename VARCHAR(1000),
password VARCHAR(1000)
)";
$conn->query($sql);
 $sql = "CREATE TABLE Settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
code VARCHAR(1000),
value VARCHAR(1000)
)";
$conn->query($sql);
 $sql = "CREATE TABLE Storage (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(99999),
value TEXT
)";
$conn->query($sql);
 $sql = "CREATE TABLE Blockedips (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
blocked VARCHAR(99999),
value TEXT
)";
$conn->query($sql);
 $sql = "CREATE TABLE Posts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(99999),
author VARCHAR(99999),
value TEXT
)";
$conn->query($sql);
 $sql = "CREATE TABLE Pages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(99999),
value TEXT
)";
$conn->query($sql);
 $sql = "CREATE TABLE Items (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(99999),
cost VARCHAR(99999),
description TEXT
)";
$conn->query($sql);
 $sql = "CREATE TABLE Orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(99999),
Products TEXT
)";
$conn->query($sql);
$sql = "INSERT INTO Administrators (id, usename, password) VALUES ('1', '" . $conn->real_escape_string(addslashes($_POST["usename"]))."', '" .md5($conn->real_escape_string($_POST["password"]))."')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('1', 'title','Multisite Central')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('2', 'maintainanceMode','0')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('3', 'welcomemsg','Welcome to Multisite')";
$conn->query($sql);
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('4', 'mail','noemail@gmail.com')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('5', 'api','')";
$conn->query($sql);
$conn->close();
//$licence_key = rand(10000,99999) ."-" . rand(10000,99999) ."-" . rand(10000,99999) ."-" . rand(10000,99999) ."-" . rand(10000,99999);
//$test = file_get_contents("http://www.tecflare.com/multisite/?cmd=add&serial=" . $licence_key);
//file_put_contents("../licence",$licence_key);
header("Location: index.php?page=4");
} else {
 
}
?>