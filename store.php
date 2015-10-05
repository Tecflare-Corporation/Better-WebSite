<?php
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
  
 // Do charging Here
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
 $sql = "INSERT INTO Orders (id, email, products) VALUES ('" . rand(1000,9999) . "', 'noaddress@outlook.com', '" . $row[1] . "')";
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
<a href="?nowcharged" class="btn btn-info" role="button">Pay <?php
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
?></a>

  <?php
  die();
}
if (isset($_GET["clean"])) {
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
?>