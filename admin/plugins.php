<?php
error_reporting(0);
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Plugins</h1>
</div>
<table class="table">
    <thead>
      <tr>
        <th>Plugin Name</th>
        <th>Description</th>
        <th>Author</th>
      </tr>
    </thead>
    <tbody>
        
<?php
$plugins = scandir("../plugins");
foreach ($plugins as $file)
{
    include("../plugins/" . $file);
    plugin_header();
    echo '<tr>
    <td>' . $title . '</td>
    <td>' . $description . '</td>
    <td>' . $author . '</td>
    </tr>
    ';
    do_begin_admin();
}
?>
</table>
<?php
include("functions/footer.php");
?>
