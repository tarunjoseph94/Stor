<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php'; ?>

	</head>
	<body>

    <nav class="navbar sticky-top bg-nav">
      <span class="navbar-brand" href="#">Stor</span>
      <div class="navbar-right width25">
        <a class="navbar-links" href="admin_faculty.php">Faculty</a>
        <a class="navbar-links" href="admin_student.php">Student</a>
        <a class="btn btn-color" href="logout.php">Logout</a>
      </div>
    </nav>
		<nav class="navbar sticky-top bg-nav-lower">
			<a class="navbar-links" href="#" id="create-student">Create Student</a>
			<a class="navbar-links" href="#" id="view-student">View Student</a>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<div id="results">

					</div>
				</div>

		</div>

	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
