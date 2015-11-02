<?php
include("functions/checkLogin.php");
$partnerid = $_POST["partner"];
$pp = file_get_contents("http://partners.tecflare.com/api/index.php?appid=" . $partnerid . "&command=genvkey&value=testaccount");
if ($pp == '"testaccount[vkey-:5ebbe:-vkey]"')
{
    //Account is real
    $content = '
        </div>
<a href="http://partners.tecflare.com/valid.flare?site=' . $partnerid . '">
<img src="http://partners.tecflare.com/images/badge.png">
</a>
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

    ';
    file_put_contents("../theme/footer.php",$content);
     header("Location: link.php?error=no");
}
else {
    //Account does not exist
    header("Location: link.php?error=yes");
}
?>