<?php
	function GetCoins($addr, $key)
	{
	/* Get the IP address for the target host. */
		$address = gethostbyname('server.bloocoin.org');
		
		/* Get the port for the WWW service. */
		$service_port = 3122;

		

		/* Create a TCP/IP socket. */
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			die("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
		} 

		$result = socket_connect($socket, $address, $service_port);
		if ($result === false) {
			die("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
		} 

		$in = "{\"cmd\":\"my_coins\",\"addr\":\"".$addr."\",\"pwd\":\"".$key."\"}";
		socket_write($socket, $in, strlen($in));
		$result = "";
		while ($out = socket_read($socket, 2048)) 
		{
			$result .= $out;
		}


		socket_close($socket);
		$obj = (Array)json_decode($result);
		$payload = (Array)$obj["payload"];
		return $payload["amount"];
	}
	function GetTransactions($addr, $key)
	{

			/* Get the port for the WWW service. */
		$service_port = 3122;

		/* Get the IP address for the target host. */
		$address = gethostbyname('server.bloocoin.org');

		/* Create a TCP/IP socket. */
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			die("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
		} 

		$result = socket_connect($socket, $address, $service_port);
		if ($result === false) {
			die("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
		} 

		$in = "{\"cmd\":\"transactions\",\"addr\":\"".$addr."\",\"pwd\":\"".$key."\"}";
		socket_write($socket, $in, strlen($in));
		$result = "";
		while ($out = socket_read($socket, 2048)) 
		{
			$result .= $out;
		}
		$obj = json_decode($result);
		$i = 0;
		$return;
		foreach($obj->payload->transactions as $item) {
			  $arr = (array)$item;
			  $return[$i] = $arr;
			  $i++;
		}
		return  array_reverse ($return);

		socket_close($socket);
	}
	function GetDifficulty()
	{
			/* Get the port for the WWW service. */
		$service_port = 3122;

		/* Get the IP address for the target host. */
		$address = gethostbyname('server.bloocoin.org');

		/* Create a TCP/IP socket. */
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			die("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
		} 

		$result = socket_connect($socket, $address, $service_port);
		if ($result === false) {
			die("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
		} 

		$in = "{\"cmd\":\"get_coin\"}";
		socket_write($socket, $in, strlen($in));
		$result = "";
		while ($out = socket_read($socket, 2048)) 
		{
			$result .= $out;
		}


		socket_close($socket);
		$obj = (Array)json_decode($result);
		$payload = (Array)$obj["payload"];
		
		echo $payload["difficulty"];
	}
	function GetTotalCoins()
	{
				/* Get the port for the WWW service. */
		$service_port = 3122;

		/* Get the IP address for the target host. */
		$address = gethostbyname('server.bloocoin.org');

		/* Create a TCP/IP socket. */
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			die("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
		} 

		$result = socket_connect($socket, $address, $service_port);
		if ($result === false) {
			die("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
		} 

		$in = "{\"cmd\":\"total_coins\"}";
		socket_write($socket, $in, strlen($in));
		$result = "";
		while ($out = socket_read($socket, 2048)) 
		{
			$result .= $out;
		}
		socket_close($socket);
		$obj = (Array)json_decode($result);
		$payload = (Array)$obj["payload"];
		return $payload["amount"];
	}
	function SendCoins($addr, $key, $to, $amount)
	{
		/* Get the port for the WWW service. */
		$service_port = 3122;

		/* Get the IP address for the target host. */
		$address = gethostbyname('server.bloocoin.org');

		/* Create a TCP/IP socket. */
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			die("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
		} 

		$result = socket_connect($socket, $address, $service_port);
		if ($result === false) {
			die("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
		} 

		$in = "{\"cmd\":\"send_coin\",\"to\":\"".$to."\",\"addr\":\"".$addr."\",\"pwd\":\"".$key."\",\"amount\":".$amount."}";
		socket_write($socket, $in, strlen($in));
		$result = "";
		while ($out = socket_read($socket, 2048)) 
		{
			$result .= $out;
		}
		socket_close($socket);
		$obj = (array)json_decode($result);
		return ($obj["success"] == "true");
	}

	function Login($addr, $key)
	{
		/* Get the port for the WWW service. */
		$service_port = 3122;

		/* Get the IP address for the target host. */
		$address = gethostbyname('server.bloocoin.org');

		/* Create a TCP/IP socket. */
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			die("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
		} 

		$result = socket_connect($socket, $address, $service_port);
		if ($result === false) {
			die("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
		} 

		$in = "{\"cmd\":\"my_coins\",\"addr\":\"".$addr."\",\"pwd\":\"".$key."\"}";
		socket_write($socket, $in, strlen($in));
		$result = "";
		while ($out = socket_read($socket, 2048)) 
		{
			$result .= $out;
		}

		socket_close($socket);
		$obj = (Array)json_decode($result);
		return ($obj["success"] == true);
	}
?>