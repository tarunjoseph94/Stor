<?php
session_start();
	//echo $_SESSION['login_status'];
	$_SESSION['login_status']=0;
	echo $_SESSION['login_status'];
	echo '<script type="text/javascript">
				alert("You have logged out");
			 window.location= ("http://localhost/Stor/index.php");
	</script>';
?>
