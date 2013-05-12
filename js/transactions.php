
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
		<?php
			include 'inc/auth.php';
			include 'inc/api.php';
			include 'inc/aes.php';
			if (!$auth)
			{
				header("location: index.php");
			}
			$key = fnDecrypt($_SESSION['key'], "9aN2SgPfcD1b56vY92YwOhdLdEsazG3n");
		?>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Online BLC wallet - transactions</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
		
					<h1 id="head">Online BLC wallet</h1>
		
		<ul id="navigation">
			<li><a href="wallet.php">Wallet</a></li>
			<li><span class="active">Transactions</span></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<table>
						<thead>
							<tr>
								<th>From</th>
								<th>To</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$transactions =  (array)GetTransactions($_SESSION["addr"], $key);
							foreach ($transactions as &$item)
							{
								echo "<tr>";
								echo "<td>".$item["to"]."</td>";
								echo "<td>".$item["from"]."</td>";
								echo "<td>".$item["amount"]."</td>";
								echo "</tr>";
							}
						?>
						</tbody>
					</table>
				</div>
			</div>

	</body>
</html>