<!DOCTYPE html>
<html class="no-js">
<head>
<script src="js/modernizr-latest.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Biakcom</title>
</head>
<body>
    <header class="main">
        <h1>Frontdesk</h1>
    </header>
	<style>
		* { margin:0; padding: 0; list-style-type: none; }
		body { line-height: 24px; font-size: 16px; }
		#fl_table { font-size: 1em }
		#fl_table a { font-size: .75em }
		#fl_table li .low { width: 3%; text-align: center }
		#fl_table li .hi { width: 21%; text-align: left }
		
		#fl_table li div { float: left; display: block; width: 10%; border-bottom: 1px dotted #999 }
		#fl_table li { clear: both; position: relative}
		#fl_table li:hover .del { display: block; position: absolute; left: 100%; width: 100px; margin-left: -100px; }
	</style>
	<?php
		$con=mysqli_connect("127.0.0.1:3306","adminfd","adminfd","frontdesk");

		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		
		$view = mysqli_query($con, "SELECT * FROM log ORDER BY start DESC");
		echo "<ul id='fl_table'>";
		while($row = mysqli_fetch_array($view)){
			echo "<li>".
			"<div class='low'>" . $row['query'] . "</div>".
			"<div>" . $row['start'] . "</div>".
			"<div>" . $row['customer'] . "</div>";
			
			$products = explode(",",$row['product']);
			echo "<div class='hi'>"; 
			foreach ($products as $product){
				switch ($product){
				case 1:
					echo "Document. ";
					break;
				case 2:
					echo "Desktop / Laptop. ";
					break;
				case 3:
					echo "Monitor. ";
					break;
				case 4:
					echo "Printer / Scanner / Copier / Fax. ";	
					break;
				case 5:
					echo "Speaker / Microphone. ";
					break;
				case 6:
					echo "Adaptor / Battery / Charger. ";
					break;
				case 7:
					echo "Power Supply / UPS. ";
					break;
				case 8:
					echo "ISP. ";	
					break;
				}				
			}
			echo "</div>";
			
			$services = explode(",",$row['service']);
			echo "<div class='hi'>"; 
			foreach ($services as $service){
				switch ($service){
				case 1:
					echo "Type. ";
					break;
				case 2:
					echo "Print. ";
					break;
				case 3:
					echo "Jilid. ";
					break;
				case 4:
					echo "Install/repair/update OS. ";	
					break;
				case 5:
					echo "Install/update driver. ";
					break;
				case 6:
					echo "Install/update anti-virus. ";
					break;
				case 7:
					echo "Install application. ";
					break;
				case 8:
					echo "Replace cartridge. ";	
					break;
				case 9:
					echo "Maintenance / repair / part replacement. ";	
					break;
				}				
			}
			echo "</div>";
			
			echo "<div>" . $row['notes'] . "</div>";
			echo "<div class='low'>" . $row['ispaid'] . "</div>";
			echo "<div class='low'>" . $row['istaken'] . "</div>";
			echo "<div class='low'><a href=frontdeskUpdate.php?id=".$row['idlog'].">" . edit. "</a></div>";
			echo "<div class='low'><a href=frontdeskDelete.php?id=".$row['idlog'].">" . delete. "</a></div>";
			echo "</li>";
		} 
		echo "</ul>";		
	?>
</body>
</html>
