<?php
error_reporting(0);
include("functions/checkLogin.php");
include("../config.php");
if (isset($_GET["error"]))
{
  ?><div class="alert alert-success" role="alert">
Settings Saved Successfully.</div>
  <?php
}
include("functions/head.php");
?>
<div class="page-header">
<h1>Settings</h1>
</div>
<?php
if (isset($_GET["error"]))
{
  ?>
Settings Saved Successfully.
  <?php
}
?>
<form method="POST" action="do.php">
    <input type="hidden" name="sync" value="CkLogin">
<?php
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,code,value FROM Settings";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
    if ($row[1] == "title") $nami="Site Title";
    if ($row[1] == "theme") $nami="Site Theme";
    if ($row[1] == "maintainanceMode") 
    {
        if ($row[2] == "on") $fami = "checked";
    echo ' <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Lock Site</span>
  <input type="hidden" name="mmode" value="0" />
  <input type="checkbox" name="mmode" class="form-control" aria-describedby="basic-addon1" ' . $fami . '>
</div><br>';
    } else {
         echo ' <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">' . $nami . '</span>
  <input type="text" name="' .$row[1] . '" class="form-control" value='.$row[2].'>
</div><br>';
    }
    }
    mysqli_free_result($result);
    mysqli_close($con);
?>

<br>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Welcome Message</span>
    <textarea name="content" style="width:100%">
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
    </textarea>
    </div>
<div  class="pull-right">
<input type="submit" class="btn btn-info" value="Save" role="button">
</div></form>
<br>
<a href="edit.php?imi=style/bootstrap.min.css">Edit Style</a>
<a href="edit.php?imi=javascript/bootstrap.min.js">Edit Javascript</a>
<?php
include("functions/footer.php");
?>
