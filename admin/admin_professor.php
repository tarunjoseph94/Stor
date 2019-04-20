<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php'; ?>

	</head>
	<body>

    <nav class="navbar sticky-top bg-nav">
      <span class="navbar-brand" href="#">Stor</span>
      <div class="navbar-right width30">
        <a class="navbar-links" href="admin_professor.php">Professor</a>
        <a class="navbar-links" href="admin_student.php">Student</a>
        <a class="btn btn-color" href="logout.php">Logout</a>
      </div>
    </nav>
		<nav class="navbar bg-nav-lower">
			<a class="navbar-links" href="#" id="create-professor">Create Professor</a>
			<a class="navbar-links" href="#" id="view-professor">View Professors</a>
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
