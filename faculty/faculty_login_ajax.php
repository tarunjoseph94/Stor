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
  $username=$_POST['username'];

  $password=md5($_POST['password']);
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
    $sql1="SELECT password,old_password from professor_details WHERE professor_id_pk='$username'";
  //  echo $sql1;
    if($result=mysqli_query($conn,$sql1))
    {
    $user=$result->fetch_assoc();
    $user_pwd=$user['password'];
    $user_old_pwd=md5($user['old_password']);
    //echo $user_pwd;
    //echo " xyz ".$pwd;
    if($password==$user_pwd)
    {
      $_SESSION['login_status']=2;
    //  $_SESSION['user_id']=$user['user_id_fk'];
      if($user_pwd==$user_old_pwd)
      {
        $_SESSION['username']=$username;
        echo 'old';
      }
      else {
        $_SESSION['username']=$username;
        echo "Success";
      }

    }
      else {
      echo "Error";
      }
    }
    else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
  }
}

?>
