<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="0;url=couponCreate.php" />
	<title>Coupon</title>
</head>
<body> 
<?php
	$code = $_POST['code'];
	$company = $_POST['company'];	
	$type = $_POST['type'];
	$amount = $_POST['amount'];
	$lembar = $_POST['lembar'];
	$published = $_POST['published'];	

	$j = 0;
	$isused = 0;

	echo $code ."<br>";
	echo $company ."<br>";
	echo $type ."<br>";
	echo $amount ."<br>";
	echo $lembar ."<br>";
	echo $published ."<br>";
	
	require_once 'meekrodb.2.1.class.php';
	if ($type == 9){
		//ngecek kode 
		while($j != $lembar){
			DB::insert('premium', array(
				'code' => $code,
				'company' => $company,
				'amount' => $amount,
				'isused' => $isused,
				'published' => $published
			));
			//echo $code . "<br>";
			$code = $code + 1;
			$j++;
		}
	}
	if ($type == 8){
		while($j != $lembar){
			DB::insert('solar', array(
				'code' => $code,
				'company' => $company,
				'amount' => $amount,
				'isused' => $isused,
				'published' => $published
			));
			//echo $code . "<br>";
			$code = $code + 1;
			$j++;
		}
	}
?>
</body>
</html>