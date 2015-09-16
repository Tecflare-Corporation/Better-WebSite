<?php
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>My Account</h1>
</div>
<?php
if (isset($_GET["error"]) && $_GET["error"] == 1)
{
 ?>
 <div class="alert alert-success" role="alert">Account Updated Successfully.</div>
 <?php
}
?>
<?php
if (isset($_GET["error"]) && $_GET["error"] == 2)
{
 ?>
 <div class="alert alert-danger" role="alert">The password does not meet the requirements.<br> Password must contain a symbol, number, Uppercase letter,<br>and Lowercase letter.</div>
 <?php
}
?>
<form method="POST" action="do.php">
<?php
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,usename,password FROM Administrators where usename = '" . $_SESSION["usename"] . "'";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
 {
     echo 
     '<div class="input-group">
     <input type="hidden" name="sync" value="account">
     <input type="hidden" name="synca" value="' .$row[0] .'">
  <span class="input-group-addon" id="basic-addon1">Usename</span>
  <input type="text" name="usename" class="form-control" value="' .$row[1] .'" required="true" aria-describedby="basic-addon1" readonly>
</div>';
   echo 
     '<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Password</span>
  <input type="password" name="password" class="form-control" placeholder="Password" required="true" aria-describedby="basic-addon1">
</div>';
    
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?>
    <input type="submit" class="btn btn-info" value="Save" role="button">
    </form>
<?php
include("functions/footer.php");
?>

