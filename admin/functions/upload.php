<?php
if (!isset($testmode))
{
error_reporting(0);
include("../config.php");
$key = md5("Irule17");
// Encrypt Function
function mc_encrypt($encrypt, $key){
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
}
// Decrypt Function
function mc_decrypt($decrypt, $key){
    $decrypt = explode('|', $decrypt.'|');
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ return false; }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if($calcmac!==$mac){ return false; }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}
move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$_FILES['fileToUpload']['name']);
$content = mc_encrypt(file_get_contents($_FILES['fileToUpload']['name']),$key);
$title = mc_encrypt($_FILES["fileToUpload"]["name"],$key);
unlink($_FILES['fileToUpload']['name']);
$sql = "INSERT INTO Storage (id, name, value) VALUES ('" . rand(1000,9999) . "','" . $title . "','" . $content . "')";
$conn = new mysqli($hostname, $usename, $password, $database);
$conn->query($sql);
$conn->close();
header("Location: cloudfile.php");
}
?>