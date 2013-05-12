<?php
	include 'inc/auth.php';
	if (!$auth)
	{
		header("location: index.php");
	}
	session_destroy();
	header("location: index.php");
?>