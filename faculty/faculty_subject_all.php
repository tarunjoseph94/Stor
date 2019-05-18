<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php'; ?>

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
					<div class="results">
						<div class="spacer">
							
						</div>
            <div class="view-students">
            <h2>View Students</h2>
              <?php
              include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
              ?>
              <p>
                Choose the batch
              </p>
              <select name="batch" id="batch">
                <option selected>
                  ----select---
                </option>
            <?php
            $sql1="SELECT DISTINCT `batch` FROM `student_details`";
            $res = mysqli_query($conn, $sql1);
            while ($row = $res->fetch_assoc()){
            echo "<option value=".$row['batch'].">" . $row['batch'] . "</option>";
            }
            ?>
            </select>
            <script type="text/javascript">
            $('#batch').on('change', function (event) {
              event.preventDefault();
              var batch=document.getElementById("batch").value;
                var formData=new FormData();
                formData.append('batch',batch);
                    //  for (var pair of formData.entries()) {
                    //  console.log(pair[0]+ ', ' + pair[1]);
                    //}
                     $.ajax({
                     type: "POST",
                     url: "faculty_view_all_student_file_ajax.php",
                     processData: false,
                     contentType: false,
                     data:formData,
                     success:function(result){
                     $("#view-table-results").html(result);
                    }
                    });
            });
            </script>
            <div id="view-table-results">

            </div>
            </div>
          </div>
				</div>

		</div>

	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
