<?php
include("config.php");
if (!isset($testmode))
{
include("theme/head.php");
if (isset($_SESSION["usename"])) include("theme/admin.php");
?>
<?php echo '
<h1>' . $_GET["idt"]. '</h1>';
?>
 <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Pages WHERE `name` = '" . $_GET["idt"]  . "'";
if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
        
    echo $row[2];
  

    }
  // Free result set
  mysqli_free_result($result);
} else {
    
}

mysqli_close($con);
?> 
<?php
include("theme/footer.php");
}
?>