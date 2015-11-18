<?php
error_reporting(0);
include("config.php");
if (!isset($testmode))
{
include("theme/head.php");
if (isset($_SESSION["usename"])) include("theme/admin.php");
?>
<h1>Blog</h1><br>

<center> <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Preview</th>
      </tr>
    </thead>
    <tbody>
           <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Posts";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
<tr>
        <td>' . $row[1] . '<td>
        <td><a href="preview.php?file=' . $row[1]. '">Preview</a></td>
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
  <h3>Comments
  </h3>
  <form method="POST" action="place.php">
    Name:<input type="text" class="input-group-addon" id="basic-addon1" style="width:205px" name="name"><Br>
    Comment:<textarea name="comment" class="input-group-addon" id="basic-addon1"  style="width:205px"></textarea>
    <br><input type="submit" class="input-group-addon" id="basic-addon1" style="width:205px" value="submit">
    
  </form>
           <?php
$con=mysqli_connect($hostname,$usename,$password,$database);
$sql="SELECT * FROM Comments";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
<div class="panel panel-default">
  <div class="panel-body">
    ' . $row[2]. '
    <br><div class="btn btn-primary">
  Written By <span class="badge">' . $row[1]. '</span>
</div>
  </div>
</div>
    ';
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?> 
  
<?php
include("theme/footer.php");
}
?>