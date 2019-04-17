<?php
session_start();
if(!isset($_SESSION['login_status']))
{
	$_SESSION['login_status']=0;
}
echo '
	<title>Auctnr</title>
	  <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
';
