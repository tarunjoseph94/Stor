<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>
    <title>File Management</title>
	</head>
	<body>
		<div class="container-fluid bg-color">
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<section>
						<div class="outer-box">
							<div class="header-login">
								<div class="row no-margin">
									<div class="col-sm-6 student-header login-active">
										<span>Student</span>
									</div>
									<div class="col-sm-6 teacher-header">
										<span>Teacher</span>
									</div>
								</div>
							</div>
							<div class="bottom-login">
								<div class="student-login login-bottom-box">
									<h2>Student Login</h2>
									<form>
										<p>
											USN
										</p>
										<input type="text" class="form-control login-textbox" />
										<p>
											Password
										</p>
										<input type="text" class="form-control login-textbox"/>
										<input type="submit" class=" btn btn-color" />
									</form>
								</div>
								<div class="teacher-login hide login-bottom-box">
									<h2>Faculty Login</h2>
									<form>
										<p>
											Faculty ID
										</p>
										<input type="text" class="form-control login-textbox" />
										<p>
											Password
										</p>
										<input type="text" class="form-control login-textbox"/>
										<input type="submit" class=" btn btn-color" />
									</form>
								</div>
							</div>
						</div>
			</div>

				</section>
			</div>

		</div>

	</body>
	<script src="js/bootstrap.min.js"></script>

</html>
