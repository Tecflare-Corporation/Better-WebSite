<?php 
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Themes</h1>
</div>
<p>Themes will allow you to customize your website.</p>
<form method="POST" action="setta.php">
Theme:<select name="theme">
  <?php
  $files = scandir("../styles");
  foreach ($files as $file) {
      if (!is_dir($file)) {
  echo '<option value="' . $file . '">' . substr($file, 0, -4) . '</option>';
      }
  }
  ?>
</select><Br><input type="submit" value="Set Theme">
<?php
include("functions/footer.php");
?>
