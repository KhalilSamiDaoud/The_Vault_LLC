<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="theme-color" content="#64FFDA" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<link rel='shortcut icon' type='image/png' href='favicon.png' />
		<title>The Vault LLC Database</title>

		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	
	<body>
		<nav class="teal lighten-1" role="navigation">
			<div class="nav-wrapper container thin-font">
				<a id="logo-container" href="#" class="brand-logo">Welcome - ADMIN</a>
			</div>
		</nav>
  
		<div class="container">
			<div class="section no-pad-bot" id="index-banner">
				<h3 class="header center">The Vault LLC Database</h3>
			</div>
	
			<br>
			
			<div class = "row">
				<form class = "col s3 l3 m3">
					<label>Current Table</label>
					<select name="forma" onchange="location = this.value;">
						<option value="store.php">Store</option>
						<option value="brand.php">Brand</option>
						<option value="item.php">Item</option>
						<option value="buys.php">Buys</option>
						<option value="contains.php">Contains</option>
						<option value="customer.php">Customer</option>
						<option value="custphonenum.php">CustPhoneNum</option>
						<option value="distributor.php">Distributor</option>
						<option value="shipment.php">Shipment</option>
						<option value="stocks.php">Stocks</option>
					</select>
			</div>

  
  <!-- get -->
	<?php
	$servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$database = "mydb";
	
	$conn = mysqli_connect($servername, $db_username, $db_password, $database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
			
	$sql = 'SELECT * FROM store;';
	$result = $conn->query($sql);
	
	$list = array(array("StoreID"=>"","Store Name"=>"","StoreLocation"=>""));
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			array_push($list, array($row["StoreID"],$row["StoreName"],$row["StoreLocation"]));
		}
	} else {
		echo "0 results";
	}
	mysqli_close($conn);
	?>

	<?php if (count($list) > 0): ?>
		<table>
			<thead>
				<tr>
					<th><?php echo implode('</th><th>', array_keys(current($list))); ?></th>
				</tr>
			</thead>
		<tbody>

	<?php foreach ($list as $col): array_map('htmlentities', $col); ?>
		<tr>
			<td><?php echo implode('</td><td>', $col); ?></td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>
	<?php endif; ?>
	  
		<br>
		
		<a class="waves-effect waves-light btn-large modal-trigger" data-target="modify" href="store_modify.php"><i class="material-icons left">swap_vertical_circle</i>MODIFY</a>
  
		<br><br><br><br>
		</div>

		<footer class="page-footer teal lighten-1">
			<div class="footer-copyright">
				<div class="container">
					<div class="hide-on-small-only">
						Made by Bepis Teckis Inc. | 2020
						<a class="blue darken-1 waves-effect waves-light btn" style="margin-left:25px;" href="about.html">ABOUT</a>
						<a class="blue darken-1 waves-effect waves-light btn" style="margin-left:25px;" href="legal.html">LEGAL</a>
					</div>
					<div class="hide-on-med-and-up center">
						Made by Bepis Teckis Inc. | 2020
						</br>
						<a class="blue darken-1 waves-effect waves-light btn" style="margin-top:8px;" href="about.html">ABOUT</a>
						<a class="blue darken-1 waves-effect waves-light btn" style="margin-left:25px; margin-top:8px;" href="legal.html">LEGAL</a>
					</div>
				</div>
			</div>
		</footer>

		<!--  Scripts-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
		<script>
		M.AutoInit(); 
	
		$(document).ready(function(){
			$('select').formSelect();
		});
  
		$(document).ready(function(){
			$('.modal').modal();
		});
		</script>
	</body>
</html>