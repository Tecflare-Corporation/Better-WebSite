<?php
function newbkupgetit_encoder($filev,$folder)
{
   // Get real path for our folder
$rootPath = realpath($folder);

// Initialize archive object
$zip = new ZipArchive();
$zip->open($filev . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
$hash = file_get_contents($filev . '.zip');
$hash = urlencode($hash);
file_put_contents($filev . '.bkup',$hash);
unlink($filev . '.zip');
}
function newbkupgetit_decoder($filev){
    
    $unhash = file_get_contents($filev . '.bkup');
    $unhash = urldecode($unhash);
    file_put_contents($filev . ".zip", $unhash);
    system("unzip " . $filev . ".zip ../");
    unlink($filev . ".zip");
}
?>
