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
  
		<!-- change to table name -->
		<div class="container">
			<div class="section no-pad-bot" id="index-banner">
				<h3 class="header center">Modify Table - Item</h3>
			</div>
			
	<!-- remove -->
	<?php
	    if(isset($_POST['remove'])) { 
            remove(); 
        } 
		
	    if(isset($_POST['add'])) { 
            add(); 
        } 
		
	    if(isset($_POST['update'])) { 
            update(); 
        } 
		
		//remove stuff
		function remove() {
		$servername = "localhost";
		$db_username = "root";
<<<<<<< HEAD
		$db_password = "password";
		$database = "440_project_chk";
=======
		$db_password = "";
		$database = "mydb";
>>>>>>> 1a19a59f9e5fcb6e88eb41b832f15284275ef827
		
		//set local vars
		$itemid=$_POST['itemid']; 
		
		$conn = mysqli_connect($servername, $db_username, $db_password, $database);
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
			
		//update
		$sql = 'DELETE FROM item WHERE ItemID='.$itemid.';';
		$result = $conn->query($sql);
	
		mysqli_close($conn);
	
		//update link to table page
		echo "<script>window.location = 'item.php'</script>";
		}
		
		//add stuff
		function add() {
		$servername = "localhost";
		$db_username = "root";
<<<<<<< HEAD
		$db_password = "password";
		$database = "440_project_chk";
=======
		$db_password = "";
		$database = "mydb";
>>>>>>> 1a19a59f9e5fcb6e88eb41b832f15284275ef827
		
		//update vars
		$itemid=$_POST['itemid']; 
		$brandid=$_POST['brandid'];
		$itemname=$_POST['itemname'];
		
		$conn = mysqli_connect($servername, $db_username, $db_password, $database);
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
			
		//update 
		$sql = 'INSERT INTO item VALUES ('.$itemid.', '.$brandid.', "'.$itemname.'");';
		$result = $conn->query($sql);
	
		mysqli_close($conn);
	
		//update 
		echo "<script>window.location = 'item.php'</script>";
		}
		
		//update stuff
		function update() {
		$servername = "localhost";
		$db_username = "root";
<<<<<<< HEAD
		$db_password = "password";
		$database = "440_project_chk";
=======
		$db_password = "";
		$database = "mydb";
>>>>>>> 1a19a59f9e5fcb6e88eb41b832f15284275ef827
		
		//update
		$itemid=$_POST['itemid']; 
		$brandid=$_POST['brandid'];
		$itemname=$_POST['itemname'];
		
		$conn = mysqli_connect($servername, $db_username, $db_password, $database);
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
			
		//update
		$sql = 'UPDATE item SET ItemID='.$itemid.', BrandID='.$brandid.', ItemName="'.$itemname.'" WHERE ItemID='.$itemid.';';
		$result = $conn->query($sql);
	
		mysqli_close($conn);
		
		//update
		echo "<script>window.location = 'item.php'</script>";
		}
	?>
	
 <!-- forms, update add, remove, update -->
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a href="#remove" class="active" >Remove</a></li>
        <li class="tab col s4"><a href="#add">Add</a></li>
        <li class="tab col s4"><a href="#update">Update</a></li>
      </ul>
    </div>
	<br>
	
    <div id="remove" class="col s12">
	<br>
	<br>
		<form method="post"> 
		<p>Item ID to remove:</p>
		<input type="text" name="itemid"/> 
		<input class="btn" type="submit" name="remove" value="REMOVE" /> 
		</form> 
	<br>
	<br>
	<br>
	<br>
	<br>
	</div>
	
    <div id="add" class="col s12">
	<br>
	<br>
		<form method="post"> 
		<p>Item ID:</p>
		<input type="text" name="itemid"/> 
		<p>Brand ID:</p>
		<input type="text" name="brandid"/> 
		<p>Item Name:</p>
		<input type="text" name="itemname"/> 
		<input class="btn" type="submit" name="add" value="ADD" /> 
		</form> 
	<br>
	<br>
	<br>
	</div>
    <div id="update" class="col s12">
	<br>
	<br>
		<form method="post"> 
		<p>Item ID:</p>
		<input type="text" name="itemid"/> 
		<p>Brand ID:</p>
		<input type="text" name="brandid"/> 
		<p>Item Name:</p>
		<input type="text" name="itemname"/> 
		<input class="btn" type="submit" name="update" value="UPDATE" /> 
		</form> 
	<br>
	<br>
	<br>
	</div>
  </div>
  
		<a class="waves-effect waves-light btn-large modal-trigger" href="item.php"><i class="material-icons left">arrow_left</i>BACK</a>
		<br>
		<br>
		<br>
		<br>
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>