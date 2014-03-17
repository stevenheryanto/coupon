<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="0;url=couponSearch.php">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Coupon</title>
</head>
<body> 
<?php
	$campur = $_POST['campur'];
	$type = substr($campur,0,1);
	$company = substr($campur,1,3);	
	$amount = substr($campur,4,2);
	$code = substr($campur,6,6);
	$isused = 1;	
	$price = $_POST['price'];
	$used = $_POST['used'];	
	$extra = $_POST['extra'];
	$extraused = $_POST['extraused'];
	if ($extra != 0){
		$amount = $amount - $extra;
	}
	
	require_once 'meekrodb.2.1.class.php';	
	if ($type == 9){
		DB::query("UPDATE premium SET isused=%s WHERE code=%s AND company=%s", 
			$isused, $code, $company);
		if ($price != null){
			DB::query("UPDATE premium SET price=%s WHERE code=%s AND company=%s", 
			$price,	$code, $company);
		}
		if ($used != null){
			DB::query("UPDATE premium SET used=%s WHERE code=%s AND company=%s", 
			$used, $code, $company);
		}
		if ($extra != null){
			DB::query("UPDATE premium SET amount=%s, extra=%s WHERE code=%s AND company=%s", 
			$amount, $extra, $code, $company);
		}
		if ($extraused != null){
			DB::query("UPDATE premium SET extraused=%s WHERE code=%s AND company=%s", 
			$extraused,	$code, $company);
		}
	} else if ($type == 8){
		DB::query("UPDATE solar SET isused=%s WHERE code=%s AND company=%s", 
			$isused, $code, $company);
		if ($price != null){
			DB::query("UPDATE solar SET price=%s WHERE code=%s AND company=%s", 
			$price,	$code, $company);
		}
		if ($used != null){
			DB::query("UPDATE solar SET used=%s WHERE code=%s AND company=%s", 
			$used, $code, $company);
		}
		if ($extra != null){
			DB::query("UPDATE solar SET amount=%s, extra=%s WHERE code=%s AND company=%s", 
			$amount, $extra, $code, $company);
		}
		if ($extraused != null){
			DB::query("UPDATE solar SET extraused=%s WHERE code=%s AND company=%s", 
			$extraused,	$code, $company);
		}

	}
	
?>
</body>
</html>