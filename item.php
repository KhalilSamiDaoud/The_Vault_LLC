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
					<select>
						<option value="1"></option>
						<option value="2">Brand</option>
						<option value="3">Buys</option>
						<option value="4">Contains</option>
						<option value="5">Customer</option>
						<option value="6">CustPhoneNum</option>
						<option value="7">Distributor</option>
						<option value="8">Item</option>
						<option value="9">Shipment</option>
						<option value="10">Stocks</option>
						<option value="11">Store</option>
					</select>
			</div>
  
			<!--<ul class="collection with-header">
				<li class="collection-header"><h4>The name of the Table</h4></li>
				<li class="collection-item">table entry 1</li>
				<li class="collection-item">table entry 2</li>
				<li class="collection-item">table entry 3</li>
				<li class="collection-item">table entry 4</li>
			</ul>-->
<?php
	$servername = "localhost";
	$db_username = "root";
	$db_password = "password";
	$database = "440_project_chk";
	
	$conn = mysqli_connect($servername, $db_username, $db_password, $database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		
	$shop = array( array("title"=>"rose", "price"=>1.25 , "number"=>15),
				   array("title"=>"daisy", "price"=>0.75 , "number"=>25),
				   array("title"=>"orchid", "price"=>1.15 , "number"=>7)); 
	
	
	$sql = 'SELECT * FROM item;';
	$result = $conn->query($sql);
	
	$list = array(array("ItemID"=>"","BrandID"=>"","Item Name"=>""));
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			#echo "ItemID: " . $row["ItemID"]. " BrandID: " . $row["BrandID"]. " ItemName ". $row["ItemName"]. "<br>";
			array_push($list, array($row["ItemID"],$row["BrandID"],$row["ItemName"]));
		}
	} else {
		echo "0 results";
	}
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


	  
			<a class="waves-effect waves-light btn-large modal-trigger" data-target="add"><i class="material-icons left">add_circle</i>ADD</a>
			<a class="waves-effect waves-light btn-large modal-trigger" data-target="remove"><i class="material-icons left">remove_circle</i>REMOVE</a>
			<a class="waves-effect waves-light btn-large modal-trigger" data-target="modify"><i class="material-icons left">swap_vertical_circle</i>MODIFY</a>
	
			<div id="add" class="modal">
				<div class="modal-content">
					<h4>Add Entry:</h4>
					<p>To Do~</p>
				</div>
				<div class="modal-footer">
					<a href="#!" class="blue modal-close waves-effect waves-green btn-flat">DONE</a>
				</div>
			</div>
  
			<div id="remove" class="modal">
				<div class="modal-content">
					<h4>Remove Entry:</h4>
					<p>To Do~</p>
				</div>
				<div class="modal-footer">
					<a href="#!" class="blue modal-close waves-effect waves-green btn-flat">DONE</a>
				</div>
			</div>
  
			<div id="modify" class="modal">
				<div class="modal-content">
					<h4>Modify Entry:</h4>
					<p>To Do~</p>
				</div>
				<div class="modal-footer">
					<a href="#!" class="blue modal-close waves-effect waves-green btn-flat">DONE</a>
				</div>
			</div>
  
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