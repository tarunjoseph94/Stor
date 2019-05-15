<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php';
    include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
    $usn=$_GET['usn'];
    ?>

	</head>
	<body>
    <nav class="navbar sticky-top bg-nav">
      <span class="navbar-brand" href="#">Stor</span>
      <div class="navbar-right width70">
				<a class="navbar-links" href="faculty_subject_add.php">Add subjects</a>
				<a class="navbar-links" href="faculty_subject_view.php">Active subjects</a>
				<a class="navbar-links" href="faculty_subject_all.php">View all subjects</a>
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
                    <h3><?php echo $usn; ?></h3>
                    <h5>Subjects</h5>
                    <?php

                      $sql1="SELECT DISTINCT `subject_id_fk`,subject_details.subject_name as subname,subject_details.subject_code as subcode FROM `file_details` JOIN subject_details on `subject_details`.`subject_id_pk`=`file_details`.`subject_id_fk` where file_details.usn_fk='$usn'";
                      $res=mysqli_query($conn, $sql1);
                      while ($row = $res->fetch_assoc()){
                     ?>
                     <div class="row">
                       <span class="student-file-list" onclick="showFiles('<?php echo $row['subject_id_fk']; ?>')"><?php echo $row['subcode']; ?> - <?php echo $row['subname']; ?> </span>
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
                    function showFiles(subid)
                    {
                      var usn='<?php echo $usn; ?>';
                      document.getElementsByClassName("file-results").innerHTML="";
                      var formData=new FormData();
                      formData.append('usn',usn);
                      formData.append('subjectid',subid);
                      //  for (var pair of formData.entries()) {
                      //  console.log(pair[0]+ ', ' + pair[1]);
                      //}
                      $.ajax({
                        type: "POST",
                        url: "faculty_list_file_ajax.php",
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
