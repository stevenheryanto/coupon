<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ds.dibiakcom.net/jquery/jquery-latest.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/font-awesome.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Coupon</title>
	<style>
		form { margin: 0 0 0 10%;}
		#fl_table { margin: 0 0 0 20%; }
	</style>
	<script>
	</script>
	<?php
		$comp =  $_POST['company'];
		$type =  $_POST['type'];
		
	?>
</head>
<body>
	<form action="couponRead.php" method="post">
		<label>&nbsp; </label><select name="type">
		<option value=9 <?php if($type == 9) echo 'selected'?>>Premium</option>
		<option value=8 <?php if($type == 8) echo 'selected'?>>Solar</option>
		<select/>

		<select name="company">
		<?php
			echo "comp nih: " .$comp;
			require_once 'meekrodb.2.1.class.php';
			$listcompany = DB::query("SELECT * FROM instansi ORDER BY namainstansi");
			foreach ($listcompany as $lcompany) {
				echo "<option value=".$lcompany['kode']."";
				if($comp == $lcompany['kode']){
				//if(1 == 2){
					echo " selected";
				}
				echo ">".$lcompany['namainstansi']."</option>";
				
				//echo "<option value=".$lcompany['kode'].">".$lcompany['namainstansi']."</option>";
				//<?php if($company == $lscompany['kode']) echo 'selected'
				//value=".$lcompany['kode']." 
				//".if($company == $lcompany['kode']) echo 'selected'."
			}
		?>
		</select>
		</label><input class="button" name="submit" type="submit" value="Submit">
	</form>
	<?php
		//$company =  $_POST['company'];
		//$type =  $_POST['type'];
		if ($type == 9){
			$results = DB::query("SELECT * FROM premium, instansi WHERE premium.company = instansi.kode and kode=%s ORDER BY code", $comp );
			echo "<ul id='fl_table'>";
			foreach ($results as $row){
				echo "<li>".
				"<div class=hi>" . $row['namainstansi'] . "</div>".
				"<div><a href='premiumUpdate.php?id=".$row['id']."'>" . $row['code'] . "</a></div>".
				"<div>" . $row['amount']  . " liter</div>";
				echo "</li>";			
			} 
			echo "</ul>";
		} else if ($type == 8){
			$results = DB::query("SELECT * FROM solar, instansi WHERE solar.company = instansi.kode and kode=%s ORDER BY code", $comp );
			echo "<ul id='fl_table'>";
			foreach ($results as $row){
				echo "<li>".
				"<div class=hi>" . $row['namainstansi'] . "</div>".
				"<div ><a href='solarUpdate.php?id=".$row['id']."'>" . $row['code'] . "</a></div>".
				"<div >" . $row['amount']  . " liter</div>";
				echo "</li>";			
			} 
			echo "</ul>";
		}
	?>
	<li id="bottom">
	<a href=couponCreate.php><i class="icon-plus-sign icon-4x"></i></a>	
	<a href=couponSearch.php><i class="icon-search icon-4x"></i></a>
	<a href=couponDate.php><i class="icon-calendar icon-4x"></i></a>
	</li>
</body>
</html>ion>
		<option value=27 <?php if($company == 27) echo 'selected'?>>DPU</option>
		<option value=28 <?php if($company == 28) echo 'selected'?>>DEPAG</option>
		<option value=29 <?php if($company == 29) echo 'selected'?>>DEPNAKER</option>
		<option value=30 <?php if($company == 30) echo 'selected'?>>LAPAN</option>
		<option value=31 <?php if($company == 31) echo 'selected'?>>GPA</option>
		<option value=32 <?php if($company == 32) echo 'selected'?>>PKM</option>
		<option value=33 <?php if($company == 33) echo 'selected'?>>PJJ</option>
		<option value=34 <?php if($company == 34) echo 'selected'?>>PZJD</option>
		<option value=35 <?php if($company == 35) echo 'selected'?>>METEO</option>
		<option value=36 <?php if($company == 36) echo 'selected'?>>KDCM</option>
		<option value=37 <?php if($company == 37) echo 'selected'?>>PSDS</option>
		<option value=38 <?php if($company == 38) echo 'selected'?>>KEHUTANAN</option>
		<option value=39 <?php if($company == 39) echo 'selected'?>>PERKEBUNAN</option>
		<option value=40 <?php if($company == 40) echo 'selected'?>>RRI</option>
		<option value=41 <?php if($company == 41) echo 'selected'?>>DDLAJ</option>
		<option value=42 <?php if($company == 42) echo 'selected'?>>PERTAHANAN</option>
		<option value=43 <?php if($company == 43) echo 'selected'?>>KKPB</option>
		<option value=44 <?php if($company == 44) echo 'selected'?>>UUUDP/BP3D</option>
		<option value=45 <?php if($company == 45) echo 'selected'?>>BOP</option>
		<option value=46 <?php if($company == 46) echo 'selected'?>>P2JKK</option>
		<option value=47 <?php if($company == 47) echo 'selected'?>>PJLN</option>
		<option value=48 <?php if($company == 48) echo 'selected'?>>img</option>
		<option value=49 <?php if($company == 49) echo 'selected'?>>RSUD</option>
		<option value=50 <?php if($company == 50) echo 'selected'?>>KOREM 173</option>
		<option value=51 <?php if($company == 51) echo 'selected'?>>KANTOR FLL</option>
		<option value=52 <?php if($company == 52) echo 'selected'?>>DANIEL</option>
		<option value=53 <?php if($company == 53) echo 'selected'?>>KESPEL</option>
		<option value=54 <?php if($company == 54) echo 'selected'?>>KLK</option>
		<option value=55 <?php if($company == 55) echo 'selected'?>>LAIN-LAIN</option>
		<option value=56 <?php if($company == 56) echo 'selected'?>>BAPPEDA/SEKWILDA/BUPATI</option>
		<option value=57 <?php if($company == 57) echo 'selected'?>>RPH</option>
		<option value=58 <?php if($company == 58) echo 'selected'?>>DISPENDA</option>
		<option value=59 <?php if($company == 59) echo 'selected'?>>KOPERASI</option>
		<option value=60 <?php if($company == 60) echo 'selected'?>>PERIKANAN (DKP)</option>
		<option value=61 <?php if($company == 61) echo 'selected'?>>TKBM</option>
		<option value=62 <?php if($company == 62) echo 'selected'?>>PERINDAG</option>
		<option value=63 <?php if($company == 63) echo 'selected'?>>WMI</option>
		<option value=64 <?php if($company == 64) echo 'selected'?>>PETERNAKAN</option>
		<option value=65 <?php if($company == 65) echo 'selected'?>>HNB</option>
		<option value=66 <?php if($company == 66) echo 'selected'?>>DINSOS</option>
		<option value=67 <?php if($company == 67) echo 'selected'?>>DINBUD</option>
		<option value=68 <?php if($company == 68) echo 'selected'?>>K3. PAK</option>
		<option value=69 <?php if($company == 69) echo 'selected'?>>SINAR SURI</option>
		<option value=70 <?php if($company == 70) echo 'selected'?>>PPAB</option>
		<option value=71 <?php if($company == 71) echo 'selected'?>>DKP SUP</option>
		<option value=72 <?php if($company == 72) echo 'selected'?>>PT. IS</option>
		<option value=73 <?php if($company == 73) echo 'selected'?>>KRT</option>
		<option value=74 <?php if($company == 74) echo 'selected'?>>SAMUDRA S.</option>
		<option value=75 <?php if($company == 75) echo 'selected'?>>BAWASDA SUP.</option>
		<option value=76 <?php if($company == 76) echo 'selected'?>>DISTANHUT SUP.</option>
		<option value=77 <?php if($company == 77) echo 'selected'?>>FARMASI</option>
		<option value=78 <?php if($company == 78) echo 'selected'?>>ADPEL</option>
		<option value=79 <?php if($company == 79) echo 'selected'?>>PUS. DP</option>
		<option value=80 <?php if($company == 80) echo 'selected'?>>SEKDA PUS.</option>
		<option value=81 <?php if($company == 81) echo 'selected'?>>PB. MEDIACARE</option>
		<option value=82 <?php if($company == 82) echo 'selected'?>>SINAR KAYU</option>
		<option value=83 <?php if($company == 83) echo 'selected'?>>DINKES SUP.</option>
		<option value=84 <?php if($company == 84) echo 'selected'?>>DIRSTRIK WARSA</option>
		<option value=85 <?php if($company == 85) echo 'selected'?>>PK-KAB. BIAK N/BPMK</option>
		<option value=86 <?php if($company == 86) echo 'selected'?>>DISNAKER SUP.</option>
		<option value=87 <?php if($company == 87) echo 'selected'?>>SEKDA BIAK</option>
		<option value=88 <?php if($company == 88) echo 'selected'?>>KESBAG</option>
		<option value=89 <?php if($company == 89) echo 'selected'?>>DEPNAKER</option>
		</select>
		</label><input class="button" name="submit" type="submit" value="Submit">
	</form>
	<?php
		require_once 'meekrodb.2.1.class.php';
		$company =  $_POST['company'];
		$type =  $_POST['type'];
		if ($type == 9){
			$results = DB::query("SELECT * FROM premium, instansi WHERE premium.company = instansi.kode and kode=%s ORDER BY code", $company );
			echo "<ul id='fl_table'>";
			foreach ($results as $row){
				echo "<li>".
				"<div class=hi>" . $row['namainstansi'] . "</div>".
				"<div><a href='premiumUpdate.php?id=".$row['id']."'>" . $row['code'] . "</a></div>".
				"<div>" . $row['amount']  . " liter</div>";
				echo "</li>";			
			} 
			echo "</ul>";
		} else if ($type == 8){
			$results = DB::query("SELECT * FROM solar, instansi WHERE solar.company = instansi.kode and kode=%s ORDER BY code", $company );
			echo "<ul id='fl_table'>";
			foreach ($results as $row){
				echo "<li>".
				"<div class=hi>" . $row['namainstansi'] . "</div>".
				"<div ><a href='solarUpdate.php?id=".$row['id']."'>" . $row['code'] . "</a></div>".
				"<div >" . $row['amount']  . " liter</div>";
				echo "</li>";			
			} 
			echo "</ul>";
		}
	?>
	<li id="bottom">
	<a href=couponCreate.php><i class="icon-plus-sign icon-4x"></i></a>	
	<a href=couponSearch.php><i class="icon-search icon-4x"></i></a>
	<a href=couponDate.php><i class="icon-calendar icon-4x"></i></a>
	</li>
</body>
</html>