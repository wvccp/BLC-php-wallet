<?php
	ini_set('display_errors', '0');
	session_start();
	if (isset($_SESSION['addr'])) 
	{
		$auth = true;
	}
	else {
		$auth = false;
	}
?>