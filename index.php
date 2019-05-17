<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>

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
										<input type="text" class="form-control login-textbox" name="student-usn-login" id="student-usn-login" />
										<p>
											Password
										</p>
										<input type="password" class="form-control login-textbox" name="student-password-login" id="student-password-login"/>
										<input type="submit" class=" btn btn-color" id="student-login-submit"/>
									</form>
									<div class="spacer">
									</div>
									<a href="forgot_password.php">Forgot Password?</a>
								</div>
								<div class="teacher-login hide login-bottom-box">
									<h2>Faculty Login</h2>
									<form>
										<p>
											Faculty ID
										</p>
										<input type="text" class="form-control login-textbox" name="faculty-id-login" id="faculty-id-login"/>
										<p>
											Password
										</p>
										<input type="password" class="form-control login-textbox" name="faculty-password-login" id="faculty-password-login"/>
										<input type="submit" class=" btn btn-color" name="faculty-login-submit" id="faculty-login-submit"/>
									</form>
									<div class="spacer">
									</div>
									<a href="forgot_password.php">Forgot Password?</a>
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
