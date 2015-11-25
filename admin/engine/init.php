<?php
error_reporting(E_ALL);
class menu {
    private $mymenu = Array();
 public function registermenu($opt) {
     $this->mymenu[] = $opt;
 } 
 public function getmenu() {
     return $this->mymenu;
 }
}
$menu = new menu;
include "../config.php";
//include PHP HOOKS Class
include_once "engine/phphooks.class.php";
//create instance of class
$hook = new Phphooks();
//fetch the active plugins name form db. store in array $plugins. 
include_once 'engine/database.class.php';
$db = new Database($hostname, $usename, $password, $database, '');
$db->connect();
$sql = "SELECT filename FROM Plugins WHERE action = '" . $db->escape(1) . "'";
$result_rows = $db->fetch_all_array($sql);
foreach ($result_rows as $result_rows)
    $plugins[] = $result_rows['filename'];
    //unset means load all plugins in the plugin fold. set it, just load the plugins in this array.
$hook->active_plugins = $plugins;
//set hook to which plugin developers can assign functions
$hook->set_hook('test');
//load plugins from folder, if no argument is supplied, a 'plugins/' constant will be used
//trailing slash at the end is REQUIRED!
//this method will load all *.plugin.php files from given directory, INCLUDING subdirectories
$hook->load_plugins();
//now, this is a workaround because plugins, when included, can't access $hook variable, so we
//as developers have to basically redefine functions which can be called from plugin files
function add_hook ($tag, $function, $priority = 10)
{
    global $hook;
    $hook->add_hook($tag, $function, $priority);
}
//same as above
function register_plugin ($plugin_id, $data)
{
    global $hook;
    $hook->register_plugin($plugin_id, $data);
}
function register_menu ($opt) {
    global $menu;
    $menu->registermenu($opt);
}
function return_menu () {
    global $menu;
    return $menu->getmenu();
}

?>