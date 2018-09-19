<?php


	function getRateFromSql($cur1, $cur2) {

		$servername = "localhost";
		$username = "root";
		$password = "andy821115";
		$dbname = "test";
		$result;

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: ". $conn->connect_error);
		}
		//echo "Connected successfully";
		// 設置編碼，防止中文亂碼
		mysqli_query($conn , "set names utf8");
		$sqlCommand = "SELECT * FROM exchange_rate_from_api WHERE currency2 = '". $cur2. "'";
		//選擇DB
		mysqli_select_db($conn, $dbname);
		//sql指令
		$retval = mysqli_query($conn, $sqlCommand);
		if(! $retval ) {
			die("connectting failed: ". mysqli_error($conn));
		}
		$cou = 0;
		while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
			$result[$cou] = array($row['currency1'], $row['currency2'], $row['exchange_rate'], $row['time']);
			$cou++;
		}
		mysqli_close($conn);
		return $result;
	}

	function getCurTypeFromSql() {

		$servername = "localhost";
		$username = "root";
		$password = "andy821115";
		$dbname = "test";
		$result;

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: ". $conn->connect_error);
		}
		//echo "Connected successfully";
		// 設置編碼，防止中文亂碼
		mysqli_query($conn , "set names utf8");
		$sqlCommand = "SELECT * FROM currency_type";
		//選擇DB
		mysqli_select_db($conn, $dbname);
		//sql指令
		$retval = mysqli_query($conn, $sqlCommand);
		if(! $retval ) {
			die("connectting failed: ". mysqli_error($conn));
		}
		$cou = 0;
		while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
			$result[$cou] = array($row['cur_id'], $row['en_name'], $row['ch_name']);
			$cou++;
		}
		mysqli_close($conn);
		return $result;
	}



?>