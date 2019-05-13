<?php
  session_start();
  include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
  $username = $_SESSION['username'];
  $subjectid = $_SESSION['subject_id'];
  $count = count($_FILES['fileToUpload']['name']);
  //print_r($_FILES);

  //echo "../Uploads/".$_SESSION['batch'];
  if (!is_dir("../Uploads/".$_SESSION['batch'])) {
    //Create our directory if it does not exist
    mkdir("../Uploads/".$_SESSION['batch'],0744,true);
  }
  if (!is_dir("../Uploads/".$_SESSION['batch']."/".$_SESSION['username'])) {
    //Create our directory if it does not exist
    mkdir("../Uploads/".$_SESSION['batch']."/".$_SESSION['username'],0744,true);
  }
  if (!is_dir("../Uploads/".$_SESSION['batch']."/".$_SESSION['username']."/".$_SESSION['subject_id'])) {
    //Create our directory if it does not exist
    mkdir("../Uploads/".$_SESSION['batch']."/".$_SESSION['username']."/".$_SESSION['subject_id'],0744,true);
  }
  for ($i = 0; $i < $count; $i++) {
    $target_dir = "../Uploads/".$_SESSION['batch']."/".$_SESSION['username']."/".$_SESSION['subject_id']."/";
    //echo $_FILES["fileToUpload"]["name"];
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
    $uploadOk = 1;
    $filename=basename($_FILES["fileToUpload"]["name"][$i]);

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
            $sql1="INSERT INTO file_details(file_name,usn_fk,subject_id_fk) VALUES ('$filename','$username','$subjectid')";
            echo $sql1;
            if (mysqli_query($conn, $sql1)) {
            echo "Success";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  }
?>
