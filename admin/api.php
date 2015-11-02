<?php
include("functions/checkLogin.php");
error_reporting(0);
$file="apilibrary.php";
if (file_exists($file) && isset($_GET["install"])) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="msiteAPIlibrary.zip"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>API</h1>
</div>
<?php
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if (!file_exists("../api_keys.php") || isset($_GET["regenerate"]))
{
    $public = rand(10000,99999) . rand(10000,99999) . rand(10000,99999) . rand(10000,99999);
    $private = rand(10000,99999) . rand(10000,99999) . rand(10000,99999) . rand(10000,99999);
    $content = "
    <" . '?' . "php
    " . '$' . "public = '" . $public. "'" . ';' . "
    " . '$' . "private = '" . $private. "'" . ';' . "
    " . '?' . ">
    ";
    file_put_contents("../api_keys.php",$content);
    echo "<div class='alert alert-success'>Created New Keys!</div>";
} 
include("../api_keys.php");
echo "Public Key:" . $public . "<br>";
echo "Private Key:" . $private . "<br>";
echo "API location:" .substr_replace($actual_link, "", -14) . "/api/<br>";
?>
<a href="?regenerate">Regenerate A New Key</a><br>
<a href="?install">API Library</a>
<?php
include("functions/footer.php");
?>