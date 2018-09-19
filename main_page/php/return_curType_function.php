<?php
	
	header("Content-Type:text/html;charset=utf-8");
	function returnCurType($cur) {
		$curData = getCurTypeFromSql();
		echo "<form>";
		echo "<select id='". $cur. "' name='". $cur. "' class='selBox' >";
		for($i=0; $i<count($curData); $i++) {
			echo "<option value='{$curData[$i][1]}'>{$curData[$i][2]}</option>";
		}
		echo "</select>";
		echo "</form>";

	}
?>