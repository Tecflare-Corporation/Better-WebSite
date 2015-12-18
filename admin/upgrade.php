<?php
error_reporting(0);
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Upgrade to Pro</h1>
</div>
<?php
if (isset($_GET["err"])) {
    echo "<div class='alert alert-danger'>The licence key is invalid.</div>";
}
?>
<p>Upgrading to Pro Allows you to have a Firewall, Automatic Update, Backup, and many more. You can purchase a licence at Codecanyon.</p>
<form method="POST" action="chlicenceval.php">
    Licence Key:<input type="text" name="prolicence"/><br>
    <input type="submit" value="Go">
</form>
<img src="style/codecanyon-dark-background.png">
<?php
include("functions/footer.php");
?>