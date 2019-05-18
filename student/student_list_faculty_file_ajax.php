<?php
 include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $subjectid=$_POST['subjectid'];
   $batch=$_POST['batch'];
   $id=$_POST['id'];
   $sql1="SELECT `file_name` FROM `subject_details` JOIN file_details on file_details.subject_id_fk=subject_details.subject_id_pk WHERE batch='$batch' AND subject_details.professor_id_fk=file_details.id AND `subject_id_fk`='$subjectid'";
  // $sql1 = "SELECT `file_name` FROM `file_details` WHERE `subject_id_fk`='$subjectid' AND `id`='$usn'";
   $res=mysqli_query($conn, $sql1);
   ?>
   <h4>Download Files</h4>
   <?php
   while ($row = $res->fetch_assoc()){
     $targetpath="../Uploads/".$batch."/".$id."/".$subjectid."/".$row['file_name'];
  ?>
  <div class="row">
    <a class="file-list" href="<?php echo $targetpath; ?>" download><?php echo $row['file_name']; ?></a>
  </div>
<?php
 }
}
 ?>
