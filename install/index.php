<?php
if (!isset($testmode))
{
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Install Tecflare Multisite</title>
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link href="style/bootstrap.theme.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>
  <body class="container">
   
   <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand"><strong>Tecflare</strong> Multisite</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
if ($_GET["page"] == 1)
{
  ?>
<ol class="breadcrumb">
  <li>Installer</li>
  <li>Step 1</li>
</ol>
<div class="page-header">
  <h1>Step 1 <small>Welcome to Setup</small></h1>
</div>
<div class="container">
    <p>
    Welcome to the beta Multisite script. This script will allow you to create an awesome multiwebsite. This script will allow you to be able to have multiple website like Google Images, Google Mail, and etc.
    </p>

    <a href="index.php?page=aa" class="btn btn-info" role="button">Next</a>
    </div>
</div>
<?php
}
elseif ($_GET["page"] == "aa")
{
  echo '
<ol class="breadcrumb">
  <li>Installer</li>
  <li>Step 1a</li>
</ol>
<div class="page-header">
  <h1>Step 1a <small>Requirements</small></h1>
</div>
<div class="container">
 <p>
  <div class="alert alert-info">
  ';
  $version = phpversion();
  if (!$version > "4.0.5")
  {
    die("PHP version must be above 4.0.5.");
  }
  if (file_exists("../config.php"))
  {
    die("System already installed");
  }

    echo "System meets requirements.";
  
echo '
 </p>
  </div>
    <a href="index.php?page=2" class="btn btn-info" role="button">Next</a>
    </div>
</div>';
}
elseif($_GET["page"] == 2)
{
  echo '
  <ol class="breadcrumb">
  <li>Installer</li>
  <li>Step 2</li>
</ol>
<div class="page-header">
  <h1>Step 2 <small>Database Info</small></h1>
</div>
<div class="container">
    <p>
    Please enter your MYSQL credentials to save your websites data. We need a database because this system will not save code into files as that is unsecure.
    </p>
    <div class="alert alert-waning" role="alert">
  <strong>Waning!</strong> Database will be edited.
</div>
';
if ($_GET["error"] == 1)
{
  ?>
 <div class="alert alert-danger" role="alert">
  <strong>Error!</strong> Cannot connect to database or there is a problem with the database.
</div>
<?php
}
?>
    <form method="POST" action="import.php">
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Hostname</span>
  <input type="text" name="hostname" class="form-control" placeholder="Localhost" aria-describedby="basic-addon1">
</div>
 <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Usename</span>
  <input type="text" name="usename" class="form-control" placeholder="root" aria-describedby="basic-addon1">
</div>
 <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Password</span>
  <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
</div>
 <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Database</span>
  <input type="text" name="database" class="form-control" placeholder="" aria-describedby="basic-addon1">
</div>
         <a href="index.php?page=1" class="btn btn-info" role="button">Back</a>
    <input type="submit" class="btn btn-info" value="Next" role="button">
    </form>
    </div>
</div>
  <?php
}
elseif ($_GET["page"] == 3 && file_exists("../config.php"))
{
 ?>
   <ol class="breadcrumb">
  <li>Installer</li>
  <li>Step 3</li>
</ol>
<div class="page-header">
  <h1>Step 3 <small>Admin Account</small></h1>
</div>
<div class="container">
    <p>
        <?php
        if ($_GET["error"] == 9)
{
  ?>
 <div class="alert alert-danger" role="alert">
  <strong>Error!</strong> Password must contain a symbol, Uppercase/Lowercase letter, and number.
</div>
<?php
}
?>
        Now we need to create you an admin account so you can use our system. Please make sure that you can remember the usename or password.
    </p>
    <form method="POST" action="import.php">
     <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Usename</span>
  <input type="hidden" name="type" value="yes">
  <input type="text" name="usename" class="form-control" placeholder="admin" required="true" aria-describedby="basic-addon1">
</div>
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Password</span>
  <input type="password" name="password" class="form-control" placeholder="admin" required="true" aria-describedby="basic-addon1">
</div>
<input type="submit" class="btn btn-info" value="Next" role="button">
</form>
 <?php
}
elseif($_GET["page"] == 4 && file_exists("../config.php"))
{
    ?>
      <ol class="breadcrumb">
  <li>Installer</li>
  <li>Step 3</li>
</ol>
<div class="page-header">
  <h1>Step 4 <small>Thank You</small></h1>
</div>
<div class="container">
    <p>
        Your account has now been created. To login please go to http://website-here.com/admin/. Make
        sure that you delete the install folder.
    </p>
    <?php
    
} else {
  header("Location: ?page=1");
}
?>

    <script src="javascript/bootstrap.min.js"></script>
    <script src="javascript/jquery.js"></script>
  </body>
</html>
<?php
}
?>