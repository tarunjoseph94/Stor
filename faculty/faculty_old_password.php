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
          <div class="">
            <h2>Update your password</h2>
            <form>
              <p>
                New password
              </p>
              <input type="password" class="form-control login-textbox" name="faculty-new-password" id="faculty-old-password" />
              <p>
                Confirm Password
              </p>
              <input type="password" class="form-control login-textbox" name="faculty-confirm-password" id="faculty-new-password"/>
              <input type="submit" class=" btn btn-color" id="faculty-update-password-submit"/>
            </form>
          </div>
			   </div>
		</div>
	</body>
	<script src="../js/bootstrap.min.js"></script>

</html>
