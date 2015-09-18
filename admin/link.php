<?php
error_reporting(0);
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Link Tecflare Partner Account</h1>
</div>
<?php
if (isset($_GET["error"]) && $_GET["error"] == "yes")
{
    ?>
    <div class="alert alert-danger">Partner does not exist.</div>
    <?php
}
if (isset($_GET["error"]) && $_GET["error"] == "no")
{
    ?>
   <div class="alert alert-success">Partner linked successfully.</div> 
<?php
}
?>
<form method="POST" action="linkit.php">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Partner ID:</span>
  <input type="text" name="partner" class="form-control" placeholder="tecflare-0000" required="true" aria-describedby="basic-addon1">
</div>
<input type="submit" class="btn btn-info" value="Link" role="button">
</form>
<?php
include("functions/footer.php");
?>