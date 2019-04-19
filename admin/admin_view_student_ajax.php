<?php
include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $batch=$_POST['batch'];
        $sql1="SELECT `usn_pk`,`old_password` FROM `student_details` WHERE `batch`=$batch";;
        //echo $sql1;
        $res=mysqli_query($conn, $sql1)  ?>
          <div class="row">
            <div class="col-sm-3">
              <h5>USN</h5>
            </div>
            <div class="col-sm-3">
              <h5>Password</h5>
            </div>
          </div>
          <?php
          while ($row = $res->fetch_assoc()){
            ?><div class="row">
              <div class="col-sm-3">
                <h6><?php echo $row['usn_pk']; ?></h6>
              </div>
              <div class="col-sm-3">
                <h6><?php echo $row['old_password']; ?></h6>
              </div>
            </div>

            <?php
        }
      }

?>
