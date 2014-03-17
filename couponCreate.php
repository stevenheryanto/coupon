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
	<form action="couponC.php" method="post">
		<label>First code: </label> 
		<input type="number" name="code" pattern="[0-9 ]*" required>
		<br>
		<label>Company: </label>
		<select name="company">
		<?php
			require_once 'meekrodb.2.1.class.php';
			$listcompany = DB::query("SELECT * FROM instansi ORDER BY namainstansi");
			foreach ($listcompany as $lcompany) {
				echo "<option value=".$lcompany['kode'].">".$lcompany['namainstansi']."</option>";
			}
		?>
		
		<!--option value=1>DENBEKANG</option>
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
		<option value=89>DEPNAKER</option-->
		</select>
		<br>
		<label>Type: </label>
		<select name="type">
		<option value=9>Premium</option>
		<option value=8>Solar</option></select>
		<br>
		<label>Amount: </label>
		<input type="number" name="amount" min=0>
		<br>
		<label>Total: </label>
		<input type="number" name="lembar" min=1>
		<br>
		<label>Published: </label>
		<input type="date" name="published">

		<br><br>
		<label>&nbsp; </label><input class="button" name="submit" type="submit" value="Submit">
	</form>
    </ul>
	<li id="bottom">
	<a href=couponSearch.php><i class="icon-search icon-4x"></i></a>
	<a href=couponDate.php><i class="icon-calendar icon-4x"></i></a>
	<a href=couponRead.php><i class="icon-list icon-4x"></i></a>
	</li>
</body>
</html>