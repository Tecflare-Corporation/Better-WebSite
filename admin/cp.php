<?php
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Dashboard</h1>
</div>

<?php
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,code,value FROM Settings";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
     if ($row[2] == "on") echo '<div class="alert alert-waning" role="alert">Waning! Maintanance Mode is active.</div>';
    }
   mysqli_free_result($result);
    mysqli_close($con);
    ?>
    <div class="  well well-sm"><ul class="list-group">
  <li class="list-group-item">
    <span class="badge"><?php
    $count = 0;
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,usename,password FROM Administrators";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
     $count = $count + 1;
    }
   mysqli_free_result($result);
    mysqli_close($con);
    echo $count;
    ?>
    </span>
    Administrators
  </li>
</ul>
<div class="  well well-sm"><ul class="list-group">
  <li class="list-group-item">
    <span class="badge">
     <?php echo $version; ?>
     </span>
     System Version
</li></ul></div>
<?php
include("functions/footer.php");
?>

