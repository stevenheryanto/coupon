<?php
	require_once 'meekrodb.2.1.class.php';	
	$id = $_POST['id'];
	$ids = $_POST['ids'];
	$jenis = $_POST['jenis'];
	$extra = $_POST['extra'];	
	$extrad = $_POST['extrad'];	
	DB::update('sisa', array(
		'extra' => $extra,
		'extrad' => $extrad,
	), "id=%s", $ids);

	if ($jenis == 8){
		echo "<meta http-equiv='refresh' content='0;url=solarUpdate.php?id=" .$id . "'/>";
	} else if ($jenis == 9){
		echo "<meta http-equiv='refresh' content='0;url=premiumUpdate.php?id=".$id ."'/>";
	}
?>