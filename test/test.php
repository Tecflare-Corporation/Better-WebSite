<?php
error_reporting(E_ALL);
function dowe($dir)
{
$web = scandir($dir);
foreach ($web as $file)
{
$ext = substr($file, -3);
if ($ext == "php"){
      echo $dir . "/" . $file . "\n";
require($dir . "/" . $file);
} 
}
}
dowe("..");
dowe("../admin");
dowe("../install");
?>