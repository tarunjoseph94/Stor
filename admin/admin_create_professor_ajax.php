<?php
 include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
session_start();
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
function generateRandomPassword($length = 8) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $professorid=$_POST['professorid'];
  $flag=0;
  if (empty($professorid)) {
    $flag=1;
  }
  else {
    $professorid = test_input($professorid);
  }

  if($flag==0)
  {
        $pwd=generateRandomPassword();
        $newpwd=md5($pwd);
        $sql1="INSERT INTO professor_details
        (professor_id_pk,password,old_password)
        VALUES ('$professorid','$newpwd','$pwd') ";

        if (mysqli_query($conn, $sql1)) {
        echo "Everything is sucessful";
        }
        else {
          echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }


}
}

?>
