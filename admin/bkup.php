<?php
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Backup</h1>
</div>
<?php
include("functions/bkup.php");
if ($_GET["do"] == "a")
{
    newbkupgetit_encoder("aaaab","../");
    ?>
    <div class="alert alert-success">Backup Complete</div>
    <?php
}
if ($_GET["do"] == "b")
{
    newbkupgetit_decoder("aaaab");
    ?>
    <div class="alert alert-success">Restore Complete</div>
    <?php
}
?>
<br>
<a href="?do=a">Build a Backup File</a><br>
<a href="?do=b">Restore Backup File</a>
<?php
include("functions/footer.php");
?>