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
	<form action="couponDate.php" method="post">
		<label>Company: </label>
		<select name="company">
		<option value=1>DENBEKANG</option>
		<option value=2>KEPOLISIAN</option>
		<option value=3>KODIM</option>
		<option value=4>PLN</option>
		<option value=5>PTN</option>
		<option value=6>MNA</option>
		<option value=7>PDAM</option>
		<option value=8>SBN (PELNI)</option>
		<option value=9>CBK (CAMAT)</option>
		<option value=10>PPAB</option>
		<option value=11>MP</option>
		<option value=12>ADPEL</option>
		<option value=13>TELKOM</option>
		<option value=14>DPRD</option>
		<option value=15>BIPHUT</option>
		<option value=16>SILOK</option>
		<option value=17>HIB</option>
		<option value=18>DEPPEN</option>
		<option value=19>PELINDO</option>
		<option value=20>P2DT/P2M</option>
		<option value=21>KPKN</option>
		<option value=22>PAP</option>
		<option value=23>PSBN</option>
		<option value=24>DRAINASE</option>
		<option value=25>BEA CUKAI</option>
		<option value=26>DPU</option>
		<option value=27>DPU</option>
		<option value=28>DEPAG</option>
		<option value=29>DEPNAKER</option>
		<option value=30>LAPAN</option>
		<option value=31>GPA</option>
		<option value=32>PKM</option>
		<option value=33>PJJ</option>
		<option value=34>PZJD</option>
		<option value=35>METEO</option>
		<option value=36>KDCM</option>
		<option value=37>PSDS</option>
		<option value=38>KEHUTANAN</option>
		<option value=39>PERKEBUNAN</option>
		<option value=40>RRI</option>
		<option value=41>DDLAJ</option>
		<option value=42>PERTAHANAN</option>
		<option value=43>KKPB</option>
		<option value=44>UUUDP/BP3D</option>
		<option value=45>BOP</option>
		<option value=46>P2JKK</option>
		<option value=47>PJLN</option>
		<option value=48>img</option>
		<option value=49>RSUD</option>
		<option value=50>KOREM 173</option>
		<option value=51>KANTOR FLL</option>
		<option value=52>DANIEL</option>
		<option value=53>KESPEL</option>
		<option value=54>KLK</option>
		<option value=55>LAIN-LAIN</option>
		<option value=56>BAPPEDA/SEKWILDA/BUPATI</option>
		<option value=57>RPH</option>
		<option value=58>DISPENDA</option>
		<option value=59>KOPERASI</option>
		<option value=60>PERIKANAN (DKP)</option>
		<option value=61>TKBM</option>
		<option value=62>PERINDAG</option>
		<option value=63>WMI</option>
		<option value=64>PETERNAKAN</option>
		<option value=65>HNB</option>
		<option value=66>DINSOS</option>
		<option value=67>DINBUD</option>
		<option value=68>K3. PAK</option>
		<option value=69>SINAR SURI</option>
		<option value=70>PPAB</option>
		<option value=71>DKP SUP</option>
		<option value=72>PT. IS</option>
		<option value=73>KRT</option>
		<option value=74>SAMUDRA S.</option>
		<option value=75>BAWASDA SUP.</option>
		<option value=76>DISTANHUT SUP.</option>
		<option value=77>FARMASI</option>
		<option value=78>ADPEL</option>
		<option value=79>PUS. DP</option>
		<option value=80>SEKDA PUS.</option>
		<option value=81>PB. MEDIACARE</option>
		<option value=82>SINAR KAYU</option>
		<option value=83>DINKES SUP.</option>
		<option value=84>DIRSTRIK WARSA</option>
		<option value=85>PK-KAB. BIAK N/BPMK</option>
		<option value=86>DISNAKER SUP.</option>
		<option value=87>SEKDA BIAK</option>
		<option value=88>KESBAG</option>
		<option value=89>DEPNAKER</option>
		</select>
		<br>
		<label>Date: </label>
		<input type="month" name="used"> (contoh: 2013-12)
		<br><br>
		<label>&nbsp; </label><input class="button" name="submit" type="submit" value="Submit">
	</form>
	</ul>

<?php
	$used = $_POST['used'];
	$company = $_POST['company'];;	
	$month = substr($used,5,2);
	$year = substr($used,0,4);
	
	//echo $used ."--". $company;
	//echo $month  ."--". $year;
	
	require_once 'meekrodb.2.1.class.php';

	$premiumbeli = DB::query("SELECT amount, price 
		FROM premium  
		WHERE MONTH(published)=%s AND YEAR(published)=%s AND company=%s",
		$month, $year, $company);
	$pbeli = DB::count();
	$pbamount = 0;
	foreach ($premiumbeli as $row){
		$pbamount += $row['amount'];
	}
	echo "<ul id='fl_table'><form>";
	echo "<br><label>Premium</label>";
	echo "<br><label>Beli: </label>".$pbeli ." kupon";
	echo "<br><label>: </label>".$pbamount ." liter";
	
	$premiumpakai = DB::query("SELECT amount, price, extra 
		FROM premium  
		WHERE MONTH(used)=%s AND YEAR(used)=%s AND company=%s AND isused=1", 
		$month, $year, $company);
	$ppakai = DB::count();
	$pjerk = 0;
	$ptotal = 0;
	$pamount = 0;
	//$pextra = 0;
	foreach ($premiumpakai as $row){
		//$pjerk = $row['amount'] * $row['price'];
		$pamount += $row['amount'];
		//$pextra += $row['extra'];		
		//$ptotal += $pjerk;
	}
	echo "<br><label>Pakai habis & bersisa: </label>".$ppakai ." kupon";
	echo "<br><label>: </label>".$pamount ." liter";
	
	$premiumsisa = DB::query("SELECT price, extra 
		FROM premium  
		WHERE MONTH(extraused)=%s AND YEAR(extraused)=%s AND company=%s AND isused=1", 
		$month, $year, $company);
	$pspakai = DB::count();
	$psextra = 0;
	foreach ($premiumsisa as $row){
		$psextra += $row['extra'];		
	}
	echo "<br><label>Sisa dipakai: </label>".$pspakai ." kupon";
	echo "<br><label>: </label>".$psextra ." liter";
	
	$premiumpakaisisa = DB::query("SELECT amount, price, extra 
		FROM premium  
		WHERE MONTH(used)=%s AND YEAR(used)=%s AND company=%s AND extra!=0", 
		$month, $year, $company);
	$ppakaisisa = DB::count();
	$pextra = 0;
	foreach ($premiumpakaisisa as $row){
		$pextra += $row['extra'];
	}	
	echo "<br><label>Sisa : </label>".$ppakaisisa ." kupon";
	echo "<br><label>: </label>".$pextra ." liter";
	//echo "<br><label>Total: </label>".$ptotal;
	
	$premiumunused = DB::query("SELECT amount, price 
		FROM premium  
		WHERE company=%s AND isused=0", 
		$company);
	$punused = DB::count();
	$puamount = 0;
	foreach ($premiumunused as $row){
		$puamount += $row['amount'];
	}
	echo "<br><label>Belum dipakai: </label>".$punused ." kupon";
	echo "<br><label>: </label>".$puamount ." liter";
		
	$solarbeli = DB::query("SELECT amount, price 
		FROM solar  
		WHERE MONTH(published)=%s AND YEAR(published)=%s AND company=%s",
		$month, $year, $company);
	$sbeli = DB::count();
	$sbamount = 0;
	foreach ($solarbeli as $row){
		$sbamount += $row['amount'];
	}
	echo "<br><br><label>Solar</label>";
	echo "<br><label>Beli: </label>".$sbeli ." kupon";
	echo "<br><label>: </label>".$sbamount ." liter";
	
	$solarpakai = DB::query("SELECT amount, price, extra 
		FROM solar  
		WHERE MONTH(used)=%s AND YEAR(used)=%s AND company=%s AND isused=1", 
		$month, $year, $company);
	$spakai = DB::count();
	$sjerk = 0;
	$stotal = 0;
	$samount = 0;
	foreach ($solarpakai as $row){
		//$sjerk = $row['amount'] * $row['price'];
		$samount += $row['amount'];	
		//$stotal += $sjerk;
	}
	echo "<br><label>Pakai habis & bersisa: </label>".$spakai ." kupon";
	echo "<br><label>: </label>".$samount ." liter";
	
	$solarsisa = DB::query("SELECT price, extra 
		FROM solar  
		WHERE MONTH(extraused)=%s AND YEAR(extraused)=%s AND company=%s AND isused=1", 
		$month, $year, $company);
	$sspakai = DB::count();
	$ssextra = 0;
	foreach ($solarsisa as $row){
		$ssextra += $row['extra'];		
	}
	echo "<br><label>Sisa dipakai: </label>".$sspakai ." kupon";
	echo "<br><label>: </label>".$ssextra ." liter";
	
	$solarpakaisisa = DB::query("SELECT amount, price, extra 
		FROM solar  
		WHERE MONTH(used)=%s AND YEAR(used)=%s AND company=%s AND extra!=0", 
		$month, $year, $company);
	$spakaisisa = DB::count();
	$sextra = 0;
	foreach ($solarpakaisisa as $row){
		$sextra += $row['extra'];
	}	
	echo "<br><label>Sisa : </label>".$spakaisisa ." kupon";
	echo "<br><label>: </label>".$sextra ." liter";
	//echo "<br><label>Total: </label>".$ptotal;
	
	$solarunused = DB::query("SELECT amount, price 
		FROM solar  
		WHERE company=%s AND isused=0", 
		$company);
	$sunused = DB::count();
	$suamount = 0;
	foreach ($solarunused as $row){
		$suamount += $row['amount'];
	}
	echo "<br><label>Belum dipakai: </label>".$sunused ." kupon";
	echo "<br><label>: </label>".$suamount ." liter";
	echo "</form></ul>";
?>

	<li id="bottom">
	<!--a href=couponUpdate.php><img src="pictures/search.png"></a>
	<a href=couponRead.php><img src="pictures/list.png"></a-->
	<a href=couponCreate.php><i class="icon-plus-sign icon-4x"></i></a>	
	<a href=couponUpdate.php><i class="icon-search icon-4x"></i></a>
	<a href=couponRead.php><i class="icon-list icon-4x"></i></a>
	</li>
</body>
</html>