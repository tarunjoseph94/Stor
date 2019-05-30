<?php
$zipname=$_GET['usn'].'.zip';
//echo $zipname;
if (file_exists($zipname)) {
    header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
    header("Cache-Control: public"); // needed for internet explorer
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Length:".filesize($zipname));
    header("Content-Disposition: attachment; filename=\"".$zipname."\"");
    readfile($zipname);
    unlink($zipname);
    die();
} else {
    die("Error: File not found.");
}

?>
