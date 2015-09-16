<?php
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
error_reporting(E_ALL);
// Define a 32-byte (64 character) hexadecimal encryption key
// Note: The same encryption key used to encrypt the data must be used to decrypt the data
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
?>
<div class="page-header">
<h1>Secure Cloud Storage</h1>
</div>
<form action="doi.php" method="post" enctype="multipart/form-data">
    Select A File to Upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="sync" value="upload">
    <input type="submit" value="Upload" name="submit">
</form>

  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Actions</th>
        <th>File Name</th>
      </tr>
    </thead>
    <tbody>
      <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Storage";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
          <tr>
        <td><a href="do.php?value=delfile&file=' . $row[0]. '">Delete</a>|<a href="readme.php?value=' . $row[0]. '">Preview</a></td>
        <td>' .mc_decrypt($row[1],$key).'</td>
      </tr>
    ';
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>
    </tbody>
  </table>
  </div>
</div>

<?php
include("functions/footer.php");
?>