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
      <div class="navbar-right width40">
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
					<h2>File Upload</h2>
          <div class="file-upload">
            <div class="drag-drop-box">
              <p class="file-upload-inside-box margintop3">Drop Files here</p>
              <p class="file-upload-inside-box">OR</p>
              <form enctype="multipart/form-data" class="file-upload-inside-box" id="studentfileupload">
                <input type="file" class="file-upload-inside-box" name="files[]" multiple="multiple">
              </form>
            </div>
          </div>
				</div>

		</div>

	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
