<?php
include("config.php");
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
 $sql = "CREATE TABLE Comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(99999),
about TEXT
)";
?>