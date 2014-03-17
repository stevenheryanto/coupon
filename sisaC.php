<?php
	require_once 'meekrodb.2.1.class.php';	
	$id = $_POST['id'];
	$jenis = $_POST['jenis'];
	$code = $_POST['code'];
	$company = $_POST['company'];
	$extra = $_POST['extra'];	
	$extrad = $_POST['extrad'];
	$price = 0;
	//$price = $_POST['price'];
	echo $jenis ."<br>";
	echo $code ."<br>";
	echo $company ."<br>";
	echo $extra ."<br>";
	echo $extrad ."<br>";
	
	DB::insert('sisa', array(
		'jenis' => $jenis,
		'code' => $code,
		'company' => $company,
		'extra' => $extra,
		'extrad' => $extrad,
		'price' => $price,
	));
	if ($jenis == 8){
		echo "<meta http-equiv='refresh' content='0;url=solarUpdate.php?id=" .$id . "'/>";
	} else if ($jenis == 9){
		echo "<meta http-equiv='refresh' content='0;url=premiumUpdate.php?id=".$id ."'/>";
	}
?>