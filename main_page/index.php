<!DOCTYPE html>
<html>
	<head>
		<?php include("php\\connect_sql.php"); ?>
 		<link rel="stylesheet" type="text/css" href="\main_page\style\mystyle.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 		<meta charset="UTF-8" />
 		<title>HELLO MY WORLD</title>
	</head>    
	<body>
		<?php include("titleTop.php"); ?>
		<?php include("leftMeun.php"); ?>
		<div id="centerBody">
			<div id="leftArea">
				
			</div>
			<div id="centerArea">
				<?php 
					include("php\\return_curType_function.php"); 
					returnCurType("cur1");
					returnCurType("cur2");
				?>
				<!--<input type="textbox" id="cur1" name="cur1" value="USD">-->
				<!--<input type="textbox" id="cur2" name="cur2" value="TWD">-->
				<input type="button" id="sendBtn" name="sendBtn" value="確認" onclick="sendCur()">
				<div id="tableDiv">
				</div>
				<br>
				<br>
				<br>
				
			</div>
			<div id="rightArea">
				
			</div>
			<!-- 空白盒子 -->
			<div class="clear"></div>
		</div>
	</body>
</html>
<script src="js\indexjs.js"></script>