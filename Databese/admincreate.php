<?php ob_start();?>
<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="DB_CSS.css">
<?php

	if($_SESSION){
		if($_SESSION["admin"]==1){
			// $db_host = "dbhome.cs.nctu.edu.tw";
			// $db_name = "liyu6072_cs_hw1";
		 //  	$db_user = "liyu6072_cs";
		 //    $db_password = "h110028";
		 //    $conn=new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
		 //   	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		else{
			header("Location :index.php");
		}
	}
	else{
		echo "<script type='text/javascript'>";
	    echo "alert('Please log in first!');";
	    echo "window.location.href='index.php'";
	    echo "</script>";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="DB_CSS.css">
		<style>
			div.fixed {
			    position: fixed;
			    bottom: 0;
			    right: 0;
			    width: 300px;
			    color: white;
			}
		</style>
	</head>
	<body>
		<h1> Create new user </h1>
		<form action="create.php" method="post">
			<input type="text" name="account" placeholder="Account"><br>
			<br>
			<input type="password" name="password" placeholder="Password"><br>
			<br>
			<input type="password" name="conpassword" placeholder="Confirm Password"><br>
			<br>
			<input type="text" name="name" placeholder="Name"><br>
			<br>
			<input type="text" name="email" placeholder="E-mail"><br>
			<br>
			<input type="submit" value="Create">
			<br>
		</form>
		<a href = "admin.php"> Return to administer page </a>
		<div class="fixed myMOUSE1">
			Photo credits by Harry Hong
		</div>
	</body>

</html>