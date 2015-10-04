<?php
if (!isset($testmode))
{
include("theme/head.php");
echo '';
if (isset($_SESSION["usename"])) include("theme/admin.php");
include("config.php");
 $conn = mysqli_connect($hostname, $usename, $password, $database);
 $search_term = $_POST["search"];
$results = 0;
                $result = mysqli_query($conn, "SELECT * FROM Posts WHERE `name` LIKE '%".$search_term."%' OR `author` LIKE '%".$search_term."%'");

                               if(mysqli_num_rows($result) > 0) {

                       while($row = $result->fetch_object()) {
                           $results = $results + 1;
                           echo $row->name . "<br>" . $row->author . "<br><a href='http://msite-dodiaraculus.c9.io/preview.php?file=" . $row->name ."'>Read Now</a><br><br>";
                       }
                                   
                               } else {
                                   $err = $err + 1;
              
                              }
                              echo "<br>";
                              $result = mysqli_query($conn, "SELECT * FROM Items WHERE `name` LIKE '%".$search_term."%'");
    if(mysqli_num_rows($result) > 0) {

                       while($row = $result->fetch_object()) {
                           $results = $results + 1;
                           echo $row->name . "<br>" . $row->cost . "<br><a href='store.php?addtocart=" . $row->id ."'>Add to Cart</a><br><br>";
                       }
                                  
                               } else {
                                   $err = $err + 1;
              
                              }
                              echo $results . " results found.<br>";
                              if ($err == 2) {
                                   
                                  echo "No Results Found";
                              }
include("theme/footer.php");
}
?>