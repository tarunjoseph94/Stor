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
  $username=$_SESSION['username'];
  $password=$_POST['password'];
  $flag=0;
  if (empty($username)) {
    $flag=1;
  }
  else {
    $username = test_input($username);
    // check if e-mail address is well-formed

}
  if(empty($password))
  {
    $flag=1;
  }

  if($flag==0)
  {

//      echo "11";
    $sql1="UPDATE `student_details` SET `password`='$password' WHERE usn_pk='$username'";
  //  echo $sql1;
    if(mysqli_query($conn,$sql1))
    {
      echo "Success";
    }
    else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
  }
}

?>
