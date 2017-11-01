<?php

	define('DB_HOST', ''); // User Specified
	define('DB_USER', ''); // User Specified
	define('DB_PASSWORD', ''); // User Specified
	define('DB_NAME', ''); // User Specified
	define('DOC_ROOT', ''); // User Specified
	define('DOC_PATH', '');  // User Specified

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	if($mysqli->connect_errno)
		die('Connection To The Database Could Not Be Established');

	include_once('includes/createTable.php');

?>
