<?php
	include 'inc/auth.php';
	include 'inc/api.php';
	include 'inc/aes.php';
	ini_set('display_errors', '1');
	if ($auth)
	{
		header("location: wallet.php");
	}
	else
	{	
		if(Login($_POST['addr'], $_POST['key']))
		{
			$_SESSION['addr'] = $_POST['addr'];
			$key = $_POST['key'];
			$key  = fnEncrypt($key, "9aN2SgPfcD1b56vY92YwOhdLdEsazG3n");
			$_SESSION['key'] = $key;
			header("location: wallet.php");
		}
		else
		{
			header("location: index.php?error=login");
		}
	}
?>