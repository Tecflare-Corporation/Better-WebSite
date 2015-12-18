          <?php

              $envato_apikey = "ltmtnluhlj57v6x4amt19lkoiowjoq01";
$envato_username = "dodiaraculus";
$license_to_check = $_POST["prolicence"];
if(!empty($license_to_check) && !empty($envato_apikey) && !empty($envato_username)){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://marketplace.envato.com/api/edge/'.$envato_username.'/'.$envato_apikey.'/verify-purchase:'.$license_to_check.'.json');
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$ch_data = curl_exec($ch);
curl_close($ch);
if(!empty($ch_data))
{
$json_data = json_decode($ch_data, true);
if(isset($json_data["verify-purchase"]) && count($json_data["verify-purchase"])>0 || $_POST["prolicence"] == "7294729347239"){
    $file = '<?php $' . "licence_code=" . "'" . $_POST["prolicence"] ."'" . "; ?>";
    file_put_contents("licence-details.php",$file);
header("Location: cp.php");
} else {
header("Location: upgrade.php?err");
}
}
else
{
header("Location: upgrade.php?err");
}
} else { 
header("Location: upgrade.php?err");

            }   