<?php
error_reporting(0);
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<?php
if (!isset($_GET["n"]))
{
  ?>
<div class="page-header">
<h1>Pages</h1>
</div>
<a href="?n=1" class="btn btn-info" role="button">Add Page</a>
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
           <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Pages";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
          <tr>
        <td>' . $row[1] . '<td>
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
}
else {
  ?>
  <div class="page-header">
<h1>Add Page</h1>
</div>
 <form method="POST" action="buildnew.php">
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Name</span>
  <input type="text" name="name" class="form-control" placeholder="test" aria-describedby="basic-addon1">
</div>
<textarea name="content"></textarea>
<input type="submit" class="btn btn-info" value="Create" role="button">
</form>
  <?php
}
?>
<?php
include("functions/footer.php");
?>
