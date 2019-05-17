<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php';?>

	</head>
	<body>
		<script>
		$( function() {
			$( "#student-dob").datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange:"c-70:c",
				onSelect:function(selectedDate)
			 {
						window.dob=selectedDate;
			 }
			});
		} );
		</script>
		<script>
		$( function() {
			$( "#faculty-dob" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange:"c-70:c",
				onSelect:function(selectedDate)
			 {
						window.dob=selectedDate;
			 }
			});
		} );
		</script>
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
									<h2>Fogot Password</h2>
									<form>
										<p>
											USN
										</p>
										<input type="text" class="form-control login-textbox" name="student-usn-forgot" id="student-id-forgot" />
										<p>
											Date of birth
										</p>
										<input type="text" class="form-control login-textbox" name="student-date-forgot" id="student-dob"/>
										<input type="submit" class=" btn btn-color" id="student-forgot-submit"/>
									</form>
									<div class="spacer">
									</div>
								</div>
								<div class="teacher-login hide login-bottom-box">
									<h2>Forgot Password</h2>
									<form>
										<p>
											Faculty ID
										</p>
										<input type="text" class="form-control login-textbox" name="faculty-id-login" id="faculty-id-forgot"/>
										<p>
											Date of birth
										</p>
										<input type="text" class="form-control login-textbox" name="faculty-date-forgot" id="faculty-dob"/>
										<input type="submit" class=" btn btn-color" name="faculty-forgot-submit" id="faculty-forgot-submit"/>
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
