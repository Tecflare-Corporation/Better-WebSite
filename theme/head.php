<?php
  function mime_content($filename) {

        $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower(array_pop(explode('.',$filename)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        } else {
            return 'application/octet-stream';
        }
        
  }

if (!file_exists("config.php"))
{
header("Location: install/");
die();
}
session_start();
error_reporting(0);
include("config.php");
include("checkblk.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php
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
    ?></title>
    <link href="admin/style/bootstrap.min.css" rel="stylesheet">
    <link href="admin/style/bootstrapsite.theme.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <style>

.footer {
  position: absolute;
  bottom: 0;
  height: 60px;
}

        </style>
  </head>
  <body class="container">
   
   <nav class="navbar navbar-inverse">
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
  <li> <a href="tiles.php" role="button">Downloads</a></li>
   <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Pages";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
<li><a href="pack.php?idt=' . $row[1] . '">' . $row[1] . '</a></li>
    ';
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?> 

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