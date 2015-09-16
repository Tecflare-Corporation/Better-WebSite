<?php
$plugins = scandir("../plugins");
foreach ($plugin as $file)
{
    include("../plugins/" . $file);
    do_website();
}
?>