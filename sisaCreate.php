<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ds.dibiakcom.net/jquery/jquery-latest.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/font-awesome.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Coupon</title>
<?php
	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	$code = $_GET['code'];
	$company = $_GET['company'];
?>
</head>
<body>
	<form name="myForm" action="sisaC.php" method="post">
		<li>
		<input type="hidden" name="id" value="<?= $id ?>">
		<input type="hidden" name="jenis" value="<?= $jenis ?>">
		<input type="hidden" name="code" value="<?= $code ?>">
		<input type="hidden" name="company" value="<?= $company ?>">
		<label>Sisa: </label>   
		<input type="number" name="extra" min=0 required>
		<br>
		<label>Date: </label>
		<input type="date" name="extrad" required>
		<br>
		<br>
		<label>&nbsp; </label><input class="button" name="submit" type="submit" value="Submit">
		<a href='<?php if($jenis==8) echo 'solar'; else echo 'premium'?>Update.php?id=<?= $id ?>'><input class="button" type="button" value="Back"></a>
		</li>
	</form>
</body>
</html>