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
  $name=$_POST['name'];
  $code=$_POST['code'];
  $batch=$_POST['batch'];
  $flag=0;

  if (empty($name)) {
    $flag=1;
  }
  else {
    $name = test_input($name);
  }

  if(empty($code))
  {
    $flag=1;
  }

  if(empty($batch))
  {
    $flag=1;
  }

  if($flag==0)
  {
    $username=$_SESSION['username'];
    //      echo "11";
    $sql1="INSERT INTO subject_details(subject_name,subject_code,professor_id_fk,batch) VALUES ('$name','$code','$username','$batch')";
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
