<?php
session_start();
error_reporting(0);
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="admin/style/bootstrap.min.css" rel="stylesheet">
    <link href="admin/style/bootstrapsite.theme.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>
  <body class="container">
   
   <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand"> <?php
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,code,value FROM Settings";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
     if ($row[0] == 1) echo $row[2];
     if ($row[0] == 2 && $row[2] == "on") $err = "yes";
    }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
  <li><a href="index.php">Home</a></li>
  <li> <a href="store.php"  role="button">Store</a></li>
  <li> <a href="blog.php" role="button">Blog</a></li>
      </ul>
       <form class="navbar-form navbar-right" role="search" method="POST" action="search.php">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="search">
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
if ($err == "yes")
{
    ?>
    <div class="alert alert-danger" role="alert">The site is on maintainance mode. Please come back again.</div>
    <?php
    if (!isset($_SESSION["usename"]))
    {
    die();
}}
?>