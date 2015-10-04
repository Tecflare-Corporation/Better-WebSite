
<?php
error_reporting(E_ERROR);
session_start();
$partnerid = $_POST["partner"];
$new = file_get_contents("http://partners.tecflare.com/api/index.php?appid=" . $partnerid);
if ($new == '"0x00011 Incorrect Command[vkey-:aa0b6:-vkey]"')
{
    //Account is real
    $_SESSION["nonpartner"] = $partnerid;
    header("Location: index.php?page=1");
    
}
else {
    header("Location: index.php?error=aq");
}
?>
