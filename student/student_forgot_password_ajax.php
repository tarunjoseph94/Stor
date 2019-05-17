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
  $username=$_POST['id'];
  //$password=$_POST['password'];
  $dob=$_POST['dob'];
  $flag=0;
  if (empty($username)) {
    $flag=1;
  }
  else {
    $username = test_input($username);
    // check if e-mail address is well-formed

  }

  if(empty($dob))
  {
    $flag=1;
  }

  if($flag==0)
  {
    $sql1="SELECT * FROM `student_details` WHERE `dob`='$dob' AND `usn_pk`='$username'";
    $res=mysqli_query($conn,$sql1);
    while ($rows = $res->fetch_assoc()){
      if($username==$rows['usn_pk'])
      {
        $password=$rows['old_password'];
        $sql2="UPDATE `student_details` SET `password`='$password' WHERE `usn_pk`='$username'";
      //  echo $sql1;
        if(mysqli_query($conn,$sql2))
        {
          echo "Success";
        }
        else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }


      }
      else {
        echo "fail";
      }
    }
  }
}
?>
