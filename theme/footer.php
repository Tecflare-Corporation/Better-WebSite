
        </div>
  


<footer class="footer">
  <div class="container">
    <p class="text-muted">Copyright &copy; <?php
$con=mysqli_connect($hostname,$usename, $password, $database);
$sql="SELECT id,code,value FROM Settings";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_row($result))
    {
     if ($row[0] == 1) echo $row[2];
     if ($row[0] == 2 && $row[2] == "on") $err = "yes";
    }
   mysqli_free_result($result);
    mysqli_close($con);
    ?> All rights Reserved</p>
  </div>
</footer>
   
    <script src="javascript/bootstrap.min.js"></script>
    <script src="javascript/jquery.js"></script>
  <script>
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
      lineNumbers: true,
      theme: "night",
      extraKeys: {
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        }
      }
    });
  </script>

						
</html> 

    