<?php
// Get real path for our folder
$usn=$_POST['usn'];
$batch=$_POST['batch'];
if (is_dir("../Uploads/".$batch."/".$usn))
{
$rootPath = realpath('../Uploads/'.$batch.'/'.$usn);
//echo $rootPath;
// Initialize archive object
$zip = new ZipArchive();
$zipname=$usn.'.zip';
$zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);
//var_dump($files);
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
$dlink='http://'.$_SERVER["SERVER_NAME"].'/Stor/admin/admin_zip_download.php?usn='.$usn.'&batch='.$batch;
//echo $filepath;
//$dlink = 'http://'.$_SERVER["SERVER_NAME"].'/request/download&file='.$zipid;
 //JSON response to be handled on the client side
 $result = '{"success":1,"path":"'.$dlink.'","error":null}';
 header('Content-type: application/json;');
 echo $result;
}
else {
  echo "nofile";
}?>
