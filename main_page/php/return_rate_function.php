<?php
	include("connect_sql.php");
	header("Content-Type:text/html;charset=utf-8");

	$cur1 = $_GET["cur1"];
	$cur2 = $_GET["cur2"];
	if($cur1=="USD") {
		$rateData = getRateFromSql($cur1, $cur2);
	}
	elseif($cur2=="USD") {
		$rateData = getRateFromSql($cur2, $cur1);
		for($i=0; $i<count($rateData); $i++) {
			$temp = $rateData[$i][0];
			$rateData[$i][0] = $rateData[$i][1];
			$rateData[$i][1] = $temp;
			$rateData[$i][2] = 1.0/floatval($rateData[$i][2]);
		}
	}
	else {
		$rateData = getRateFromSql("USD", $cur2);
		$rateData2 = getRateFromSql("USD", $cur1);
		for($i=0; $i<count($rateData); $i++) {
			$rateData[$i][0] = $rateData2[$i][1];
			$rateData[$i][2] = floatval($rateData[$i][2])/floatval($rateData2[$i][2]);
		}
	}


	echo "<table id='rateTB'><tr id='rateTBTitle'><td class='rateTBtd'>持有幣別</td><td class='rateTBtd'>欲換幣別</td><td class='rateTBtd'>匯率</td><td class='rateTBtd'>時間</td></tr>";
	for($i=0; $i<count($rateData); $i++) {
		echo "<tr class='rateTBItemClass'><td class='rateTBtd'> {$rateData[$i][0]}</td> ".
   	   	"<td class='rateTBtd'>{$rateData[$i][1]} </td> ".
    	"<td class='rateTBtd'>{$rateData[$i][2]} </td> ".
    	"<td class='rateTBtd'>{$rateData[$i][3]} </td> ".
    	"</tr>";
	}
	echo "</table>";
?>