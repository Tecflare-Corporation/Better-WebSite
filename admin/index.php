<?php

error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tecflare Multisite</title>
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link href="style/bootstrap.theme.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <style>
      .footer {
  position: absolute;
  bottom: 0;
  /* Set the fixed height of the footer here */
  height: 60px;

}
    </style>
  </head>
  <body class="container">
   

  <h1>Tecflare </h1>
<center>
<div class="page-header">
</div>
</center>
<div class="container">
   
<div class="panel panel-default container" style="width:55%;">
  <div class="panel-body">
      <h1>Authentication <small>Entering Control Panel</small></h1>
      <?php
      if (isset($_GET["error"]) && $_GET["error"] == 1)
      {
          ?>
          <div class="alert alert-danger" role="alert">Incorrect Usename or Password.</div>
          <?php
}
elseif (isset($_GET["error"]) && $_GET["error"] == 2)
{
?>
<div class="alert alert-danger" role="alert">Alert! Install folder needs to be deleted.</div>
<?php
      } else {
      ?>
      <div class="alert alert-info" role="alert">Please login to enter the control panel.</div>
      <?php
      }
      ?>
       <form method="POST" action="validate.php">
     <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Usename:</span>
  <input type="hidden" name="type" value="yes">
  <input type="text" name="usename" class="form-control" placeholder="admin" required="true" aria-describedby="basic-addon1">
</div>
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1"> Password:</span>
  <input type="password" name="password" class="form-control" placeholder="admin" required="true" aria-describedby="basic-addon1">
</div>
<center>
<input type="submit" class="btn btn-info" value="Login" role="button">
</center>
</form>
    </div>
</div>
</div>
</div>
<center>
<footer class="footer">
  <div class="container">
    <p class="text-muted">Copyright &copy; Tecflare All rights Reserved</p>
  </div>
  </center>
</footer>
    <script src="javascript/bootstrap.min.js"></script>
    <script src="javascript/jquery.js"></script>
  </body>
</html>
