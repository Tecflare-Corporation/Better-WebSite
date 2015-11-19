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
<h1>Accounts</h1>
</div>
<a href="?n=1" class="btn btn-info" role="button">Add User</a>
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Actions</th>
        <th>Username</th>
      </tr>
    </thead>
    <tbody>
           <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Administrators";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
          <tr>';
          if ($_SESSION["usename"] == $row[1])
          {
            echo '<td></td>';
          } else {
        echo '<td><a href="deleteusr.php?usr=' . $row[0] . '">Delete</a></td>';
          }
        
        echo '<td>' . $row[1] . '<td>
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
<h1>Add User</h1>
</div>
 <form method="POST" action="mkusr.php">
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Username</span>
  <input type="text" name="usename" class="form-control" placeholder="test" aria-describedby="basic-addon1">
</div>
  <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Password</span>
  <input type="password" name="password" class="form-control" placeholder="test" aria-describedby="basic-addon1">
</div>
<input type="submit" class="btn btn-info" value="Create" role="button">
</form>
  <?php
}
?>
<?php
include("functions/footer.php");
?>
