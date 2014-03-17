<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ds.dibiakcom.net/jquery/jquery-latest.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/font-awesome.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Coupon</title>
</head>
<body>
	<ul id='fl_table'>
	<form action="couponSearch.php" method="post">
		<label>Code: </label> 
		<input type="number" name="campur" pattern="[0-9 ]*" required>
		<br><br>
		<label>&nbsp; </label><input class="button" name="submit" type="submit" value="Submit">
	</form>
	</ul>
	<?php
		$campur = $_POST['campur'];
		
		$type = substr($campur,0,1);
		$company = substr($campur,1,3);	
		$amount = substr($campur,4,2);
		$code = substr($campur,6,6);
		/*echo "<br>".$type ;
		echo "<br>".$company ;
		echo "<br>".$amount ;
		echo "<br>".$code ;
		$price = $_POST['price'];
		$used = $_POST['used'];	
		$extra = $_POST['extra'];
		$extraused = $_POST['extraused'];
		if ($extra != 0){
			$amount = $amount - $extra;
		}
		*/
		require_once 'meekrodb.2.1.class.php';
		if ($type == 9){
			$row = DB::queryFirstRow("SELECT * FROM premium WHERE code=%s AND company=%s", 
				$code, $company );
			//echo "masuk premium";
			echo "<ul id='fl_table'><li>".
			"<div class=hi>" . $row['company'] . "</div>".
			"<div class=low><a href='premiumUpdate.php?id=".$row['id']."'>" . $row['code'] . "</a></div>".
			"<div>" . $row['amount']  . " liter</div>";
			echo "</li></ul>";
		} else if ($type == 8){
			$row = DB::queryFirstRow("SELECT * FROM solar WHERE code=%s AND company=%s",
				$code, $company );
			//echo "masuk solar";
			echo "<ul id='fl_table'><li>".
			"<div class=hi>" . $row['company'] . "</div>".
			"<div class=low><a href='solarUpdate.php?id=".$row['id']."'>" . $row['code'] . "</a></div>".
			"<div>" . $row['amount']  . " liter</div>";
			echo "</li></ul>";			
		}
	?>
	
	<li id="bottom">
	<a href=couponCreate.php><i class="icon-plus-sign icon-4x"></i></a>	
	<a href=couponDate.php><i class="icon-calendar icon-4x"></i></a>
	<a href=couponRead.php><i class="icon-list icon-4x"></i></a>
	</li>
</body>
</html>