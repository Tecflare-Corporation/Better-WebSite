<?php
error_reporting(0);
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
     <?php
     if (isset($_GET["er"]))
     {
         echo '<div class="alert alert-success">File Saved Successful</div>';
     }
     ?>
    <div class="page-header">
<h1><?php echo $_GET["imi"]; ?></h1>
</div>
<form method="POST" action="editsub.php">
    <input type="hidden" name="file" value="<?php echo $_GET["imi"]; ?>">
<textarea id="code" name="code" rows="5">
    <?php echo file_get_contents($_GET["imi"]); ?>
    </textarea>
     <input type="submit" class="btn btn-info" value="Save Changes" role="button">
   
    </form>
<?php
include("functions/footer.php");
?>