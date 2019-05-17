<!DOCTYPE html>
<html>
	<head>
		<?php include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php';
    //echo dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/header.php'; ?>
	</head>
	<body>
    <nav class="navbar sticky-top bg-nav">
      <span class="navbar-brand" href="#">Stor</span>
      <div class="navbar-right">
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
					<script>
					$( function() {
						$( "#datepicker" ).datepicker({
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
          <div class="">
            <h2>Update your password</h2>
            <form>
							<p>
								Add Date of Birth
							</p>
							<input type="text" class="form-control" id="datepicker" id="student-dob" placeholder="mm/dd/YYYY" />
							<p>
                New password
              </p>
              <input type="password" class="form-control login-textbox" name="student-new-password" id="student-old-password" />
              <p>
                Confirm Password
              </p>
              <input type="password" class="form-control login-textbox" name="student-confirm-password" id="student-new-password"/>
              <input type="submit" class=" btn btn-color" id="student-update-password-submit"/>
            </form>
          </div>
			   </div>
		</div>
	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
