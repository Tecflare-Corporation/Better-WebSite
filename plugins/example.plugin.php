<?php
/*
Plugin Name: Simatic Awesomeness Plugin
Plugin URI: http://www.example.com
Description: This is a simple awesome plugin. Does Nothing.
Version: 1
Author: Thomas Wilbur
Author URI: http://www.example.com
*/
echo register_menu("Cool");
function Cool() {
    echo "This is the page";
}
?>