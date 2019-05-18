<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php';
    include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
    $usn=$_SESSION['username'];
    ?>
	</head>
	<body>
    <nav class="navbar sticky-top bg-nav">
      <span class="navbar-brand width25" href="#">Stor</span>
      <div class="navbar-right width70">
        <a class="navbar-links" href="student_list_faculty_files.php">Faculty Files</a>
				<a class="navbar-links" href="student_active_subject.php">Active Subjects</a>
				<a class="navbar-links" href="student_prev_subject.php">Previous Subjects</a>
				<a class="btn btn-color" href="logout.php">Logout</a>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
          <div class="subject-list">
            <div class="results">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="spacer">
                    </div>
                    <h3>Faculty Uploaded Files</h3>
                    <h5>Subjects</h5>
                    <?php
                      $sql1="SELECT batch from student_details where usn_pk='$usn'";
                      $res=mysqli_query($conn, $sql1);
                      while ($row = $res->fetch_assoc()){
                        $batch=$row['batch'];
                      }
                      $sql2="SELECT DISTINCT `subject_id_fk`,subject_details.subject_name as subname,subject_details.subject_code as subcode,subject_details.professor_id_fk as id FROM `subject_details` JOIN file_details on file_details.subject_id_fk=subject_details.subject_id_pk WHERE batch='$batch' and subject_details.professor_id_fk=file_details.id";
                      $res=mysqli_query($conn, $sql2);
                      while ($row = $res->fetch_assoc()){
                     ?>
                     <div class="row">
                       <span class="file-list" onclick="showFiles('<?php echo $row['subject_id_fk']; ?>,<?php echo $row['id']; ?>')"><?php echo $row['subcode']; ?> - <?php echo $row['subname']; ?> </span>
                     </div>
                   <?php } ?>
                  </div>
                  <div class="col-sm-6">
                    <div class="spacer">
                    </div>
                    <div class="container-fluid">
                      <div class="file-results" id="file-results">
                      </div>

                    </div>
                  </div>
                  <script type="text/javascript">
                    function showFiles(subid,id)
                    {
                      var batch='<?php echo $batch; ?>';
                      document.getElementsByClassName("file-results").innerHTML="";
                      var formData=new FormData();
                      formData.append('batch',batch);
                      formData.append('id',id);
                      formData.append('subjectid',subid);
                      //  for (var pair of formData.entries()) {
                      //  console.log(pair[0]+ ', ' + pair[1]);
                      //}
                      $.ajax({
                        type: "POST",
                        url: "student_list_faculty_file_ajax.php",
                        processData: false,
                        contentType: false,
                        data:formData,
                        success:function(result)
                        {
                          if(result=='Error')
                          {
                            alert("File could not be retrived");
                          }
                          else {
                            $("#file-results").html(result);

                          }
                        }
                      });
                    }
                  </script>
                </div>
              </div>

           </div>
          </div>

        </div>

    </div>

	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
