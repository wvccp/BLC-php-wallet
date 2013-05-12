<?php
	include 'inc/auth.php';
	if ($auth)
	{
		header("location: wallet.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>

		<!--
	 _________________________________________________________________
	/                                                                  \
	|                         PHP BLC wallet                           |
	|                        Made by Prestige                          |
	|                       prestige-coding.net                        |
	 \________________________________________________________________/
																		 -->
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Online BLC wallet</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
	<h1 id="head">Online BLC wallet</h1>
	<ul id="navigation">
	<li><span class="active">Login</span></li>
		</ul>
			<div id="content" class="container_16 clearfix">
				<form action="createsession.php" method="post">
					<div class="grid_16">
						<h2>Login</h2>
						<?php
							if (isset($_GET['error']))
							{
								echo "<p class=\"error\">Wrong address or key</p>";
							}
						?>
					</div>

					<div class="grid_5">
						<p>
							<label for="addr">Your BLC address:</label>
							<input type="text" name="addr" />
						</p>
						<p>
							<label for="key">Your BLC key:</label>
							<input type="password" name="key" />
						</p>
							
					</div>

					<div class="grid_16">

						<p class="submit">
							<input type="reset" value="Reset" />
							<input type="submit" value="Login" />
						</p>
					</div>
				</form>
			</div>
		
	</body>
</html>