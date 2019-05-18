<?php
 include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $usn=$_POST['usn'];
   $subjectid=$_POST['subjectid'];
   $sql2 = "SELECT `batch` FROM `student_details` WHERE `usn_pk`='$usn'";
   $res2=mysqli_query($conn, $sql2);
   while ($row = $res2->fetch_assoc()){
     $batch=$row['batch'];
   }
   $sql1 = "SELECT `file_name` FROM `file_details` WHERE `subject_id_fk`='$subjectid' AND `usn_fk`='$usn'";
   $res=mysqli_query($conn, $sql1);
   ?>
   <h4>Download Files</h4>
   <?php
   while ($row = $res->fetch_assoc()){
     $targetpath="../Uploads/".$batch."/".$usn."/".$subjectid."/".$row['file_name'];
  ?>
  <div class="row">
    <a href="<?php echo $targetpath; ?>" class="file-list" download><?php echo $row['file_name']; ?></a>
  </div>
<?php
 }
}
 ?>
