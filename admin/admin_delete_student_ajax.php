<?php
include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
$path='../Uploads/'.$_POST['batch'].'/'.$_POST['usn'];
//echo $path;
$usn=$_POST['usn'];
if(is_dir($path))
{
delete_directory($path);
}
function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}
$sql1="DELETE FROM `student_details` WHERE `usn_pk`='$usn'";
$sql2="DELETE FROM `file_details` WHERE `id`='$usn'";
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);
echo "Success";
?>
