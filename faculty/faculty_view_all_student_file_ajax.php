<?php
include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $batch=$_POST['batch'];
        $sql1="SELECT DISTINCT `usn_fk` as usn FROM `file_details` JOIN student_details on `student_details`.`usn_pk`=`file_details`.`usn_fk` where student_details.batch='$batch'";
        $res=mysqli_query($conn, $sql1);

        ?>
        <div class="spacer">
        </div>
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
              <div class="results">
                <h2>USN</h2>
              <?php
              while ($rows = $res->fetch_assoc()){
                ?>
                <div class="row">
                  <a href="faculty_view_student_file.php?usn=<?php echo $rows['usn'];?>"><?php echo $rows['usn'];?></a>
                </div>
              <?php } ?>
              </div>
            </div>

          </div>
  <?php }
?>
