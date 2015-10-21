<?php
session_start();
error_reporting(0);
 if (empty($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
    }
include("config.php");
if (!isset($testmode))
{
include("theme/head.php");
if (isset($_SESSION["usename"])) include("theme/admin.php");
include("config.php");
session_start();
if (isset($_GET["nowcharged"]))
{
 if($_SESSION["security_code"] != $_POST["captcha"])
 {
   $mess = "Captcha%20Error";
   header("Location: ?pay&error=" . $mess);
   die();
 }
 require_once('stripe/init.php');
try{
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,code,value FROM Settings";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
     if ($row[0] == 5) $val = $row[2];
    }
   mysqli_free_result($result);
    mysqli_close($con);
\Stripe\Stripe::setApiKey($val);
$pricetag = 0;
foreach ( $_SESSION["cart"] as $product ) {
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Items WHERE id = '" . $product. "'";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
  $pricetag += $row[2];
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
}
$cost =  preg_replace('/[^A-Za-z0-9\-]/', '', $pricetag);

$myCard = array('number' => $_POST["number"], 'exp_month' => $_POST["month"], 'exp_year' => $_POST["year"]);
$charge = \Stripe\Charge::create(array('card' => $myCard, 'amount' => $cost, 'currency' => 'usd'));
} catch (Exception $e) {
$message = urlencode($e->getMessage());
header("Location: ?pay&error=" . $message);
die();
}
 $cartitems = $_SESSION["cart"];
 $_SESSION["cart"] = array();
 $items = "";
    
foreach($cartitems as $product) {
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Items WHERE id = '" . $product. "'";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
  
   $conn=mysqli_connect($hostname,$usename,$password,$database);
 $sql = "INSERT INTO Orders (id, email, products) VALUES ('" . rand(1000,9999) . "','" .  $_POST["email"] . "', '" . $row[1] . "')";
$conn->query($sql);
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
}
  header("Location: ?error=onedone");

  die();
}
if (isset($_GET["pay"]))
{
  if (isset($_GET["error"])){ echo '<div class="alert alert-danger">' . $_GET[error] . "</div>";}
  ?>
  <center> <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
           <?php
foreach($_SESSION["cart"] as $product) {
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Items WHERE id = '" . $product. "'";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
<tr>
      <td>' . $row[1] . '</td>
      <td>' . money_format('$%i',$row[2]) . '</td>
      </td>
      </tr>
      
    ';
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
}
  
?> 
</tbody>
  </table>
  </div>
  </div>
</center>
<form method="POST" action="?nowcharged">
<input type="hidden" name="credit" value="true">
Email:<input type="email" name="email" required="true" placeholder=""/><br>
Card Number:<input type="number" name="number" required="true" placeholder="XXXXXXXXXXXXXXXX" max="9999999999999999"/><br>
Expires:<input  type="number" name="month" required="true" max="99" placeholder="XX"/>/<input type="number" name="year" required="true" max="99" placeholder="XX"/>
<br><img src="captcha/image.php"><Br>
Captcha:<input  type="text" name="captcha" required="true" ><Br>
<input type="submit" class="btn btn-info" value="Pay <?php
$pricetag = 0;
foreach ( $_SESSION["cart"] as $product ) {
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Items WHERE id = '" . $product. "'";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
  $pricetag += $row[2];
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
}
echo money_format('$%i',$pricetag);
?>">
</form>


  <?php
  include("theme/footer.php");
die();
}
if (isset($_GET["clean"]) || !isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
if (isset($_GET["addtocart"]))
{
   
    
    array_push($_SESSION["cart"], $_GET["addtocart"]);
    header("Location: ?error=addtocartpassed");
}
if (isset($_GET["error"]) && $_GET["error"] == "addtocartpassed")
{
    echo '<div class="alert alert-success" role="alert">Product has been added to cart</div>
   ';
}
if (isset($_GET["error"]) && $_GET["error"] == "onedone")
{
    echo '<div class="alert alert-success" role="alert">Thank you for your purchase.</div>
   ';
}
?>
<center> <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Cost</th>
        <th>Add to Cart</th>
      </tr>
    </thead>
    <tbody>
           <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Items";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
<tr>
      <td>' . $row[1] . '</td>
      <td>' . money_format('$%i',$row[2]) . '</td>
      <td><a href="?addtocart=' . urlencode($row[0]) . '">Add to Cart</a>
      </td>
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
</center>
You have <?php echo count($_SESSION["cart"]); ?> products in your cart.<br>
Your total cost is 
<?php
$pricetag = 0;
foreach ( $_SESSION["cart"] as $product ) {
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Items WHERE id = '" . $product. "'";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
  $pricetag += $row[2];
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
}
echo money_format('$%i',$pricetag) . "<br>";
?>
<a href="?clean">Clean Cart</a><br>

<a href="?pay&price=<?php echo urldecode($pricetag); ?> ">Pay <?php echo money_format('$%i',$pricetag); ?></a>
<?php
}
include("theme/footer.php");
?>