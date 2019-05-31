<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php';
    include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
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
          <div class="spacer">
          </div>
					<h2>Active Subjects</h2>
          <div class="subject-list">

            <?php

            $sql1="SELECT DISTINCT subject_details.subject_id_pk ,subject_details.subject_name FROM subject_details LEFT JOIN student_details ON student_details.batch=subject_details.batch where subject_details.status='1'";
            $res=mysqli_query($conn, $sql1);
            while ($row = $res->fetch_assoc()){
             ?>
            <div class="row">
              <a class="subject-upload-name" href="student_file_upload.php?subid=<?php echo $row['subject_id_pk']; ?>"><?php echo $row['subject_name']; ?></a>
            </div>
          <?php } ?>
          </div>
				</div>

		</div>

	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
