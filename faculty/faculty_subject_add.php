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
            <h2>Add a subjects</h2>
            <form method="post">
              <p class="spacer">
                Subject Name
              </p>
              <input type="text" id="subject-name-add" class="form-control width50" />
              <p class="spacer">
                Subject Code
              </p>
              <input type="text" id="subject-code-add" class="form-control width50" />

              <?php
              include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
              ?>
              <p class="spacer">
                Choose the batch
              </p>
              <select name="batch" id="batch" class="form-control width50">
                <option selected disabled>
                  --------select----------
                </option>
            <?php
            $today = getdate();
            $sql1="SELECT DISTINCT `batch` FROM `student_details` ORDER BY batch DESC";
            $res = mysqli_query($conn, $sql1);
            while ($row = $res->fetch_assoc()){
            echo "<option value=".$row['batch'].">" . $row['batch'] . "</option>";
            }
            ?>
            </select>
            <div class="spacer">
              <input type="submit" id="subject-form-submit" class="btn btn-color" />
            </div>
            </form>
          </div>
				</div>
		</div>
	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
