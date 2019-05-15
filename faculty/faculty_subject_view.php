<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php';
				include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
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
					<div class="results">
            <div class="spacer">
            </div>
            <h2>Active subjects</h2>
						<?php
							$username=$_SESSION['username'];
							$sql1="SELECT * FROM `subject_details` WHERE `professor_id_fk`='$username' AND `status`='1'";
							$res=mysqli_query($conn, $sql1);
							while ($row = $res->fetch_assoc()){
						 ?>
						 <div class="results">
							 <div class="row">
	               <a class="active-subject-name" href="faculty_view_files.php?subid=<?php echo $row['subject_id_pk']; ?>"><?php echo $row['subject_name']; ?></a>
	             </div>
						 </div>
					 <?php } ?>
          </div>
				</div>
		</div>
	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
