<?php
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
if (isset($_GET["a"]))
{
    include("config.php");
   
 
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Storage";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
   if ($_GET["a"] == mc_decrypt($row[1],$key))
   {
       if (strpos($_GET["a"],'bmp') !== false) {
    $header = "image/bmp";
}
      header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . $_GET["a"] . "\""); 
echo mc_decrypt($row[2],$key);
   }
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);

    
die();
}
if (!isset($testmode))
{
include("theme/head.php");
if (isset($_SESSION["usename"])) include("theme/admin.php");
?>
<Style>
    *, *:before, *:after {box-sizing:  border-box !important;}


.row {
 -moz-column-width: 18em;
 -webkit-column-width: 18em;
 -moz-column-gap: 1em;
 -webkit-column-gap:1em; 
  
}

.item {
 display: inline-block;
 padding:  .25rem;
 width:  100%; 
}

.well {
 position:relative;
 display: block;
}
</Style>
<div class="container">
<div class="row">
  <?php
 
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Storage";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
        echo '
       <div class="item">
      <div class="well"> 
      <h4>' . mc_decrypt($row[1],$key) . '</h4><br><a href="?a=' . mc_decrypt($row[1],$key) . '">Download Now</a>
       
      </div>
    </div>

    ';
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>
</div>
</div>

<?php
include("theme/footer.php");
}
?>