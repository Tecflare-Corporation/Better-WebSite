<?php
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Dashboard</h1>
</div>
<div class="row">
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
     <div class="col-sm-4" style="background-color:darkorange;">
      <div class="tile red">
        <h4 class="title"> <?php
    $count = 0;
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT * FROM Items";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
     $count = $count + 1;
    }
   mysqli_free_result($result);
    mysqli_close($con);
    echo $count;
    ?> Products</h4>
     
   </div>
    </div>
    <div class="col-sm-4" style="background-color:darkgreen;">
      <div class="tile orange">
        <h4 class="title"><?php
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
    ?> Administrators</h4>
        
    </div>
    </div>
   <div class="col-sm-4" style="background-color:darkorange;">
      <div class="tile red">
        <h4 class="title"><?php
    $count = 0;
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT * FROM Posts";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
     $count = $count + 1;
    }
   mysqli_free_result($result);
    mysqli_close($con);
    echo $count;
    ?> Posts</h4>
        
   </div>
   </div>
  <div class="col-sm-4" style="background-color:darkblue;">
      <div class="tile purple">
        <h4 class="title">Version <?php echo $version; ?></h4>
        
   </div>
</div>
</div>
<?php
include("functions/footer.php");
?>

