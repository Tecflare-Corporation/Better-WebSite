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
  </head>
  <body class="container">
   
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MultiSite Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav pull-right">
      <li><a href="account.php"><?php echo $_SESSION["usename"]; ?></a></li>
      <li><a href="do.php?value=exit">Exit</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav">
              <li class="active"><a href="cp.php">Dashboard</a></li>
              <li><a href="settings.php">System Settings</a></li>
              <li><a href="update.php">Update</a></li>
              <li><a href="plugins.php">Plugins</a></li>
              <li><a href="cloudfile.php">Storage</a></li>
              <li><a href="ipblock.php">Firewall</a></li>
              <li><a href="bkup.php">Backup</a></li>
              <li><a href="account.php">My Account</a></li>
            
            </ul>
        </div>
        <div class="col-xs-12 col-sm-9">