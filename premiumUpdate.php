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
		require_once 'meekrodb.2.1.class.php';	
		$id = $_GET['id'];
		$row = DB::queryFirstRow("SELECT * FROM premium WHERE id=%s", $id);
		$results = DB::query("SELECT * FROM sisa WHERE jenis=9 and code=%s and company=%s" , $row['code'], $row['company']);
		$pextra = 0;
		foreach ($results as $rows){		
			$pextra += $rows['extra'];
		}
	?>
	<script>
	function allowDrop(ev)
	{
	ev.preventDefault();
	}
	function drag(ev)
	{
	ev.dataTransfer.effectAllowed='move';
	ev.dataTransfer.setData("Text",ev.target.id);
	}
	function drop(ev)
	{
		ev.preventDefault();
		var id=ev.dataTransfer.getData("Text");
		ev.target.appendChild(document.getElementById(id));		
		$.ajax({
			type: "POST",
			url: "sisaDelete.php",
			data: {"id": id},
			dataType: "text",
			success:function(data) {
				if(data) {
					alert("Log has been deleted");
				} else {
					alert("Delete fail, please try again");
				}}
		});	
	}
	function validateForm(){
		var amount = document.myForm.amount.value;
		var uses = document.myForm.uses.value;
		var pextra = document.myForm.pextra.value;
		if(uses > amount){
			alert("Use must be smaller than amount");
			return false;
		}
		document.myForm.extra.value = amount - uses - pextra;
	}
	</script>
</head>
<body>
    <ul id='fl_table'>
	<form name="myForm" action="premiumU.php" method="post" onsubmit="return validateForm()">
		<input type="hidden" name="pextra" value=<?= $pextra?>>	
		<input type="hidden" name="id" value=<?= $id ?>>
		<label>Code: </label> 
		<input type="number" name="code" pattern="[0-9 ]*" value=<?= $row['code']?> readonly>
		<br>
		<label>Company: </label>
		<select name="company">
		<?php
			$listpompa = DB::query("SELECT * FROM instansi");
			echo "<option value=0> --- Pompa --- </option>";
			foreach ($listpompa as $lpompa) {
				echo "<option value=".$lpompa['kode']."";
				if($row['company'] == $lpompa['kode']){
					echo " selected";
				}
				echo ">".$lpompa['namainstansi']."</option>";
			}
		?>
		</select>
		<br>
		<label>Amount: </label>
		<input type="number" name="amount" value=<?= $row['amount']?> readonly max=100>
		<br>
		<label>Price: </label>
		<input type="number" name="price" value=<?= $row['price']?> min=0 step=100 max=20000>
		<br>
		<label>Use: </label>
		<input type="number" name="uses" value=<?= $row['uses']?> min=0 step=0.1 max=10>
		<br>
		<label>Date: </label>
		<input type="date" name="used" value=<?= $row['used']?>>
		<br>
		<label>Extra: </label>
		<input type="number" name="extra" value=<?= $row['extra']?> readonly>
		<br>
		<label>Published: </label>
		<input type="date" name="published" value=<?= $row['published']?>>
		<br><br>
		<label>&nbsp; </label><input class="button" name="submit" type="submit" value="Submit">
	</form>
    </ul>
	<?php
		echo "<br><ul id='fl_table'>";
		$no = 1;
		$re = null;
		echo "<li><div class=low>No</div>";
		echo "<div>Extra</div>";
		echo "<div>Day</div><li>";

		foreach ($results as $rows){
			echo "<li class='drag' draggable='true' id=".$rows['id']." ondragstart=drag(event)><div class=low>".$no."</div>";
			echo "<div><a href='sisaUpdate.php?id=".$id."&ids=".$rows['id']."'>".$rows['extra']."</a></div>";
			echo "<div>".$rows['extrad']."</div></li>";
			$no++;
		}
		echo "</ul><br>";
	?>
	<li id="bottom">
	<i class="icon-trash icon-4x" ondrop="drop(event)" ondragover="allowDrop(event)"></i>
	<a href='sisaCreate.php?jenis=9&id=<?= $id ?>&code=<?= $row['code'] ?>&company=<?= $row['company'] ?>'><i class="icon-plus-sign icon-4x"></i></a>
	<a href='couponRead.php'><i class="icon-group icon-4x"></i></a>	
	</li>
</body>
</html> 'selected' ?>>PSBN</option>
		<option value=24 <?php if ($row['company'] == 24) echo 'selected' ?>>DRAINASE</option>
		<option value=25 <?php if ($row['company'] == 25) echo 'selected' ?>>BEA CUKAI</option>
		<option value=26 <?php if ($row['company'] == 26) echo 'selected' ?>>DPU</option>
		<option value=27 <?php if ($row['company'] == 27) echo 'selected' ?>>DPU</option>
		<option value=28 <?php if ($row['company'] == 28) echo 'selected' ?>>DEPAG</option>
		<option value=29 <?php if ($row['company'] == 29) echo 'selected' ?>>DEPNAKER</option>
		<option value=30 <?php if ($row['company'] == 30) echo 'selected' ?>>LAPAN</option>
		<option value=31 <?php if ($row['company'] == 31) echo 'selected' ?>>GPA</option>
		<option value=32 <?php if ($row['company'] == 32) echo 'selected' ?>>PKM</option>
		<option value=33 <?php if ($row['company'] == 33) echo 'selected' ?>>PJJ</option>
		<option value=34 <?php if ($row['company'] == 34) echo 'selected' ?>>PZJD</option>
		<option value=35 <?php if ($row['company'] == 35) echo 'selected' ?>>METEO</option>
		<option value=36 <?php if ($row['company'] == 36) echo 'selected' ?>>KDCM</option>
		<option value=37 <?php if ($row['company'] == 37) echo 'selected' ?>>PSDS</option>
		<option value=38 <?php if ($row['company'] == 38) echo 'selected' ?>>KEHUTANAN</option>
		<option value=39 <?php if ($row['company'] == 39) echo 'selected' ?>>PERKEBUNAN</option>
		<option value=40 <?php if ($row['company'] == 40) echo 'selected' ?>>RRI</option>
		<option value=41 <?php if ($row['company'] == 41) echo 'selected' ?>>DDLAJ</option>
		<option value=42 <?php if ($row['company'] == 42) echo 'selected' ?>>PERTAHANAN</option>
		<option value=43 <?php if ($row['company'] == 43) echo 'selected' ?>>KKPB</option>
		<option value=44 <?php if ($row['company'] == 44) echo 'selected' ?>>UUUDP/BP3D</option>
		<option value=45 <?php if ($row['company'] == 45) echo 'selected' ?>>BOP</option>
		<option value=46 <?php if ($row['company'] == 46) echo 'selected' ?>>P2JKK</option>
		<option value=47 <?php if ($row['company'] == 47) echo 'selected' ?>>PJLN</option>
		<option value=48 <?php if ($row['company'] == 48) echo 'selected' ?>>img</option>
		<option value=49 <?php if ($row['company'] == 49) echo 'selected' ?>>RSUD</option>
		<option value=50 <?php if ($row['company'] == 50) echo 'selected' ?>>KOREM 173</option>
		<option value=51 <?php if ($row['company'] == 51) echo 'selected' ?>>KANTOR FLL</option>
		<option value=52 <?php if ($row['company'] == 52) echo 'selected' ?>>DANIEL</option>
		<option value=53 <?php if ($row['company'] == 53) echo 'selected' ?>>KESPEL</option>
		<option value=54 <?php if ($row['company'] == 54) echo 'selected' ?>>KLK</option>
		<option value=55 <?php if ($row['company'] == 55) echo 'selected' ?>>LAIN-LAIN</option>
		<option value=56 <?php if ($row['company'] == 56) echo 'selected' ?>>BAPPEDA/SEKWILDA/BUPATI</option>
		<option value=57 <?php if ($row['company'] == 57) echo 'selected' ?>>RPH</option>
		<option value=58 <?php if ($row['company'] == 58) echo 'selected' ?>>DISPENDA</option>
		<option value=59 <?php if ($row['company'] == 59) echo 'selected' ?>>KOPERASI</option>
		<option value=60 <?php if ($row['company'] == 60) echo 'selected' ?>>PERIKANAN (DKP)</option>
		<option value=61 <?php if ($row['company'] == 61) echo 'selected' ?>>TKBM</option>
		<option value=62 <?php if ($row['company'] == 62) echo 'selected' ?>>PERINDAG</option>
		<option value=63 <?php if ($row['company'] == 63) echo 'selected' ?>>WMI</option>
		<option value=64 <?php if ($row['company'] == 64) echo 'selected' ?>>PETERNAKAN</option>
		<option value=65 <?php if ($row['company'] == 65) echo 'selected' ?>>HNB</option>
		<option value=66 <?php if ($row['company'] == 66) echo 'selected' ?>>DINSOS</option>
		<option value=67 <?php if ($row['company'] == 67) echo 'selected' ?>>DINBUD</option>
		<option value=68 <?php if ($row['company'] == 68) echo 'selected' ?>>K3. PAK</option>
		<option value=69 <?php if ($row['company'] == 69) echo 'selected' ?>>SINAR SURI</option>
		<option value=70 <?php if ($row['company'] == 70) echo 'selected' ?>>PPAB</option>
		<option value=71 <?php if ($row['company'] == 71) echo 'selected' ?>>DKP SUP</option>
		<option value=72 <?php if ($row['company'] == 72) echo 'selected' ?>>PT. IS</option>
		<option value=73 <?php if ($row['company'] == 73) echo 'selected' ?>>KRT</option>
		<option value=74 <?php if ($row['company'] == 74) echo 'selected' ?>>SAMUDRA S.</option>
		<option value=75 <?php if ($row['company'] == 75) echo 'selected' ?>>BAWASDA SUP.</option>
		<option value=76 <?php if ($row['company'] == 76) echo 'selected' ?>>DISTANHUT SUP.</option>
		<option value=77 <?php if ($row['company'] == 77) echo 'selected' ?>>FARMASI</option>
		<option value=78 <?php if ($row['company'] == 78) echo 'selected' ?>>ADPEL</option>
		<option value=79 <?php if ($row['company'] == 79) echo 'selected' ?>>PUS. DP</option>
		<option value=80 <?php if ($row['company'] == 80) echo 'selected' ?>>SEKDA PUS.</option>
		<option value=81 <?php if ($row['company'] == 81) echo 'selected' ?>>PB. MEDIACARE</option>
		<option value=82 <?php if ($row['company'] == 82) echo 'selected' ?>>SINAR KAYU</option>
		<option value=83 <?php if ($row['company'] == 83) echo 'selected' ?>>DINKES SUP.</option>
		<option value=84 <?php if ($row['company'] == 84) echo 'selected' ?>>DIRSTRIK WARSA</option>
		<option value=85 <?php if ($row['company'] == 85) echo 'selected' ?>>PK-KAB. BIAK N/BPMK</option>
		<option value=86 <?php if ($row['company'] == 86) echo 'selected' ?>>DISNAKER SUP.</option>
		<option value=87 <?php if ($row['company'] == 87) echo 'selected' ?>>SEKDA BIAK</option>
		<option value=88 <?php if ($row['company'] == 88) echo 'selected' ?>>KESBAG</option>
		<option value=89 <?php if ($row['company'] == 89) echo 'selected' ?>>DEPNAKER</option>
		</select>
		<br>
		<label>Amount: </label>
		<input type="number" name="amount" value=<?= $row['amount']?> readonly max=100>
		<br>
		<label>Price: </label>
		<input type="number" name="price" value=<?= $row['price']?> min=0 step=100 max=20000>
		<br>
		<label>Use: </label>
		<input type="number" name="uses" value=<?= $row['uses']?> min=0 step=0.1 max=10>
		<br>
		<label>Date: </label>
		<input type="date" name="used" value=<?= $row['used']?>>
		<br>
		<label>Extra: </label>
		<input type="number" name="extra" value=<?= $row['extra']?> readonly>
		<br>
		<label>Published: </label>
		<input type="date" name="published" value=<?= $row['published']?>>
		<br><br>
		<label>&nbsp; </label><input class="button" name="submit" type="submit" value="Submit">
	</form>
    </ul>
	<?php
		echo "<br><ul id='fl_table'>";
		$no = 1;
		$re = null;
		echo "<li><div class=low>No</div>";
		echo "<div>Extra</div>";
		echo "<div>Day</div><li>";

		foreach ($results as $rows){
			echo "<li class='drag' draggable='true' id=".$rows['id']." ondragstart=drag(event)><div class=low>".$no."</div>";
			echo "<div><a href='sisaUpdate.php?id=".$id."&ids=".$rows['id']."'>".$rows['extra']."</a></div>";
			echo "<div>".$rows['extrad']."</div></li>";
			$no++;
		}
		echo "</ul><br>";
	?>
	<li id="bottom">
	<i class="icon-trash icon-4x" ondrop="drop(event)" ondragover="allowDrop(event)"></i>
	<a href='sisaCreate.php?jenis=9&id=<?= $id ?>&code=<?= $row['code'] ?>&company=<?= $row['company'] ?>'><i class="icon-plus-sign icon-4x"></i></a>
	<a href='couponRead.php'><i class="icon-group icon-4x"></i></a>	
	</li>
</body>
</html>