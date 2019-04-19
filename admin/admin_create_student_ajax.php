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
  $batch=$_POST['slider'];
  $usnformat=$_POST['usnformat'];
  $usnstart=$_POST['usnstart'];
  $usnend=$_POST['usnend'];
  $flag=0;
  if (empty($usnformat)) {
    $flag=1;
    echo "1";
  }
  else {
    $usnformat = test_input($usnformat);
  }
  if(empty($usnstart))
  {
    $flag=1;
    echo "2";
  }
  if(!is_numeric($usnstart))
  {
    $flag=1;
    echo "3";
  }
  if(empty($usnend))
  {
    $flag=1;
    echo "4";
  }
  if(!is_numeric($usnend))
  {
    $flag=1;
    echo "5";
  }

  if($flag==0)
  {
    $count=$usnstart;
    //      echo "11";
    while($count!=$usnend+1){
      $pwd=generateRandomPassword();
      if($count<10)
      {
        $count+=1;
        $count-=1;
        $usn=$usnformat."0".$count;
        $sql1="INSERT INTO student_details
        (usn_pk,password,batch,old_password)
        VALUES ('$usn','$pwd','$batch','$pwd') ";
      }
      else {
        $sql1="INSERT INTO student_details
        (usn_pk,password,batch,old_password)
        VALUES ('$usnformat$count','$pwd','$batch','$pwd') ";
      }

        if (mysqli_query($conn, $sql1)) {
        echo "Everything is sucessful";
        }
        else {
          echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }
        $count+=1;
    }

}
}

?>
