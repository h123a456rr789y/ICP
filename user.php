<?php ob_start();?>
<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="DB_CSS.css">
<?php

	$db_host = "dbhome.cs.nctu.edu.tw";
	$db_name = "liyu6072_cs_hw1";
  	$db_user = "liyu6072_cs";
    $db_password = "h110028";
    $conn=new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
   	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

   	if($_SESSION["admin"]==0){
   		$account=$_SESSION['account'];
   		$sql="SELECT * FROM people WHERE account='$account'";
   		$results=$conn->query($sql);
   	}
   	else{
   		header("Location: index.php");
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
	<div id="user">
		<h1>Normal User</h1>
		<table>
			<?php
				while($row=$results->fetch()){
			?>
			<tr>
				<th>Account		</th>
				<th>Name		</th>	
				<th>E-mail		</th>
			</tr>

			<tr>
				<td><?php echo "$row[3]"?></td>
				<td><?php echo "$row[1]"?></td>	
				<td><?php echo "$row[2]"?></td>
			</tr>
			<?php
				}
			?>
		</table>
		<br>
		<form action="logout.php">
			<input type="submit" value="Log out">
		</form>
	</div>
	<div class="fixed myMOUSE1">
		Photo credits by Harry Hong
	</div>
</body>
</html>