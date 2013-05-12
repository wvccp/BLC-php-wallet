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
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
		<link href="js/glow/1.7.0/widgets/widgets.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript">
			glow.ready(function(){
				new glow.widgets.Sortable(
					'#content .grid_5, #content .grid_6',
					{
						draggableOptions : {
							handle : 'h2'
						}
					}
				);
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>

		<h1 id="head">Online BLC wallet</h1>
		
		<ul id="navigation">
			<li><span class="active">Wallet</span></li>
			<li><a href="transactions.php">Transactions</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>

			<div id="content" class="container_16 clearfix">
				<div class="grid_5">
				<div class="grid_16">
						<h2>Server stats: </h2>
						<table>
							<tbody>
								<tr>
									<td>Total BLC: </td>
									<td><?php echo  GetTotalCoins(); ?></td>
								</tr>
								<tr>
									<td>Difficulty:</td>
									<td><?php echo GetDifficulty(); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="grid_16">
						<h2>Your info: </h2>
						<table>
							<tbody>
								<tr>
									<td>Your BLC address:</td>
									<td><?php echo $_SESSION["addr"]; ?></td>
								</tr>
								<tr>
									<td>Your Coins:</td>
									<td><?php echo GetCoins($_SESSION["addr"], $key) ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="grid_16">
						<h2>Send BLC:</h2>
						<?php
							if (isset($_POST['to']))
							{
								
								if (SendCoins($_SESSION['addr'], $key, $_POST['to'], $_POST['amount']))
								{
									echo "<p class=\"success\">".$_POST['amount']." BLC has been succesfully send to ".$_POST['to'];
								}
								else
								{
									echo "<p class=\"error\">Sending ".$_POST['$amount']." to ".$_POST['to']." failed";
								}
							}
						?>
						<form method="post">
							<p>
								<label for="to">Send BLC to:</label>
								<input type="text" name="to" />
							</p>
							<p>
								<label for="amount">Amount of BLC:</label>
								<input type="number" value=1 name="amount"/>
							</p>
							<p>
								<input type="submit" value="Send BLC" />
							</p>
						</form>
					</div>
					<div class="grid_16">
						<h2>Transactions:</h2>
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
									$transactions = array_slice($transactions,0, 10);
									foreach ($transactions as &$item)
									{
										echo "<tr>";
										echo "<td>".$item["from"]."</td>";
										echo "<td>".$item["to"]."</td>";
										echo "<td>".$item["amount"]."</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
	</body>
</html>