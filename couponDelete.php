<!DOCTYPE html>
<html>
<head>

<meta http-equiv="refresh" content="0;url=couponRead.php" />
<title>Coupon</title>
<a href="couponRead.php">redirecting...</a>
</head>
<body>
	<?php 
		require_once 'meekrodb.2.1.class.php';
		$id = $_POST['id'];
		//$id = $_GET['id'];
		DB::delete('premium', "id=%s", $id);
	?>
</body>
</html>
