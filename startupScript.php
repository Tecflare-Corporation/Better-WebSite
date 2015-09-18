<?php
include("theme/head.php");
if (isset($_SESSION["usename"])) include("theme/admin.php");
?>
<center>
<div class="page-header">
  <h1>Select a Site<small></small></h1>
</div>
</center>
<div class="container">
   
<div class="panel panel-default container">
  <div class="panel-body">
   <?php
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,code,value FROM Settings";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
      if ($row[0] == 3) echo $row[2];
    }
   mysqli_free_result($result);
    mysqli_close($con);
    ?>
    </div>
</div>
</div>
</div>
</center>
<?php
include("theme/footer.php");
?>
