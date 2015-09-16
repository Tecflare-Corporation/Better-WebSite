<?php
include("functions/checkLogin.php");
include("../config.php");
include("functions/head.php");
?>
<div class="page-header">
<h1>Update</h1>
</div>

<?php
$doit = 0;
ini_set('max_execution_time',60);
 


$getVersions = file_get_contents('http://www.tecflare.cu.cc/multisite-update-packages/current-release-versions.php') or die ('ERROR');
if ($getVersions != '')
{
    //If we managed to access that file, then lets break up those release versions into an array.
    echo '<div class="alert alert-info"><p>CURRENT VERSION: '.$version.'</p>';
    echo '<p>Reading Current Releases List</p>';
    $versionList = explode("n", $getVersions);    
    foreach ($versionList as $aV)
    {
        if ( $aV > $version) {
            echo '<p>New Update Found: v'.$aV.'</p>';
            $found = true;
           
            //Download The File If We Do Not Have It
            if ( !is_file(  '../tmp/multisite-'.$aV.'.zip' )) {
                echo '<p>Downloading New Update</p>';
                $newUpdate = file_get_contents('http://www.tecflare.cu.cc/multisite-update-packages/multisite-'.$aV.'.zip');
                if ( !is_dir( '../tmp/' ) ) mkdir ( '../tmp/' );
                $dlHandler = fopen('../tmp/multisite-'.$aV.'.zip', 'w');
                if ( !fwrite($dlHandler, $newUpdate) ) { echo '<p><div class="alert alert-danger">Could not save new update. Operation aborted.</div></p>'; exit(); }
                fclose($dlHandler);
                echo '<p>Update Downloaded And Saved</p>';
            } else echo '<p>Update already downloaded.</p>';    
           
            if ($_GET['doUpdate'] == true) {
                //Open The File And Do Stuff
                $zipHandle = zip_open('../tmp/multisite-'.$aV.'.zip');
                echo '<ul>';
                while ($aF = zip_read($zipHandle) )
                {
                    $thisFileName = zip_entry_name($aF);
                    $thisFileDir = dirname($thisFileName);
                   
                    //Continue if its not a file
                    if ( substr($thisFileName,-1,1) == '/') continue;
                   
    
                    //Make the directory if we need to...
                    if ( !is_dir ( '../'.$thisFileDir ) )
                    {
                         mkdir ( '../'.$thisFileDir );
                         echo '<li>Created Directory '.$thisFileDir.'</li>';
                         $doit += 1;
                    }
                   
                    //Overwrite the file
                    if ( !is_dir('../'.$thisFileName) ) {
                        echo '<li>'.$thisFileName.'';
                        $contents = zip_entry_read($aF, zip_entry_filesize($aF));
                        $contents = str_replace("n", "n", $contents);
                        $updateThis = '';$doit += 1;
                       
                        //If we need to run commands, then do it.
                        if ( $thisFileName == 'upgrade.php' )
                        {
                            $upgradeExec = fopen ('upgrade.php','w');
                            fwrite($upgradeExec, $contents);
                            fclose($upgradeExec);
                            include ('upgrade.php');
                            unlink('upgrade.php');
                            echo'...EXECUTED</li>';$doit += 1;
                        }
                        else
                        {
                            $updateThis = fopen('../'.$thisFileName, 'w');
                            fwrite($updateThis, $contents);
                            fclose($updateThis);
                            unset($contents);
                            echo'...OK</li>';$doit += 1;
                        }
                    }
                }
                echo '</ul>';
                $updated = TRUE;
            }
            else echo '</div><div class="alert alert-success"><p>Update ready. <a href="?doUpdate=true">&raquo; Install Now?</a></p></div>';
            break;
        }
    }
    
    if ($updated == true)
    {
	 // When the directory is not empty:
 function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 }
 rrmdir("../tmp");
 rrmdir("../install");
 include("../config.php");
 $content='
 <?php
 $hostname = "' . $hostname . '";
 $usename = "' . $usename . '";
 $password = "' . $password . '";
 $database = "' . $database . '";
 $version = "' . $aV . '";
 ?>
 ';
 file_put_contents("../config.php",$content);
        echo '<div class="alert alert-success">' . $doit . ' rows processed.</div>';
        echo '&raquo; Multisite Updated to v'.$aV.'</div>';
    }
    else if ($found != true) echo '<div class="alert alert-danger"><p>&raquo; No update is available.</p></div>';

    
}
else echo '<div class="alert alert-danger"><p>Could not find latest realeases.</p></div>';
?>
<?php
include("functions/footer.php");
?>