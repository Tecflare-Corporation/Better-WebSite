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
<?php
include("theme/footer.php");
}
?>