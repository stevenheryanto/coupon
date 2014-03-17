<?php
	require_once 'meekrodb.2.1.class.php';	
	$id = $_POST['id'];
	$code = $_POST['code'];
	$company = $_POST['company'];	
	$amount = $_POST['amount'];
	$price = $_POST['price'];
	$published = $_POST['published'];	
	$used = $_POST['used'];	
	$uses = $_POST['uses'];	
	$extra = $_POST['extra'];
	
	DB::update('solar', array(
		'code' => $code,
		'amount' => $amount,
		'price' => $price,
		'company' => $company,
		'published' => $published,
		'used' => $used,
		'uses' => $uses,
		'extra' => $extra,	
	), "id=%s", $id);

	echo "<meta http-equiv='refresh' content='0;url=solarUpdate.php?id=" .$id . "'/>";	
?>