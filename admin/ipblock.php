<?php
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Application Ip Block</h1>
</div>
<?php
if (isset($_GET["error"]))
{
    ?>
    IP Blocked!
    <?php
}
?>
<form method="post" action = "blk.php">
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">IP Address:</span>
  <input type="text" name="blkip" class="form-control" required="true" aria-describedby="basic-addon1">
</div>
     <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Reason:</span>
  <input type="text" name="blkiptext" class="form-control" required="true" aria-describedby="basic-addon1">
</div>
     <input type="submit" class="btn btn-danger" value="Add Permanantly" role="button">
</form>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>IP address</th>
        <th>Reason</th>
      </tr>
    </thead>
    <tbody>
         <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Blockedips";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
  {
    echo '
    <tr>
    <td>
    ' . $row[1] . '
    </td>
    <td>
    ' . $row[2] . '
    </td>
    </tr>
    ';
  }
  }
mysqli_free_result($result);
mysqli_close($con);
?>
    </tbody>
  </table>
  </div>
</div>
<?php
include("functions/footer.php");
?>