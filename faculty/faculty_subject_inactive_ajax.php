<?php
include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $subjectid=$_POST['subjectid'];
  $flag=0;

  if (empty($subjectid)) {
    $flag=1;
  }
  else {
    $subjectid = test_input($subjectid);
  }
  $sql1="UPDATE `subject_details` SET `status`='0' WHERE `subject_id_pk`='$subjectid'";
  if (mysqli_query($conn, $sql1)) {
  echo "Success";
  }
 else {
  echo "Error";
  }
}

?>
