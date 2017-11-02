<?php ob_start();?>
<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="DB_CSS.css">
<?php

	if($_SESSION){
		if($_SESSION["admin"]==1){
			$db_host = "dbhome.cs.nctu.edu.tw";
			$db_name = "liyu6072_cs_hw1";
		  	$db_user = "liyu6072_cs";
		    $db_password = "h110028";
		    $conn=new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
		   	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$sql1=$conn->prepare("SELECT COUNT(*) FROM people WHERE 1");
			$sql1->execute();
			$count=$sql1->fetch();
			$sql2=$conn->prepare("SELECT * FROM people WHERE 1");
			$sql2->execute();
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
		<div>
			<h1>Administrator</h1>	
		</div>
		<div>
			<table>
				<tr>
					<th>Account		</th>
					<th>Name		</th>	
					<th>E-mail		</th>
					<th>Identidy	</th>
					<th>Authority   </th>
				</tr>
				<?php
				for($i=1;$i<=$count[0];$i++){
					$row=$sql2->fetch();
					if($_SESSION["account"]==$row[3]){
				?>
						<tr>
							<td><?php echo $row[3]?></td>
							<td><?php echo $row[1]?></td>
							<td><?php echo $row[2]?></td>
							<td><?php 
									if($row[5]==1){echo "Administrator";} 
									else{echo "Normal User";}
								?>	
							</td>
						</tr>
				<?php
                	}
            		else{
                ?>
		                <tr>
		                	<td><?php echo $row[3]?></td>
		                	<td><?php echo $row[1]?></td>
		                	<td><?php echo $row[2]?></td>
		                	<td><?php 
		                			if($row[5]==1){echo "Administrator";} 
		                			else{echo "Normal User";}
		                		?>	
		                	</td>
		                	<td><a href="delete.php?id=<?php echo $row['account'];?>" onClick="return confirm('Confirm Delete？');">Delete account</a></td>
                            <td><a href="promote.php?id=<?php echo $row['account'];?>" onClick="return confirm('Confirm Promotion？');">Promote</a></td>
		                </tr>
				<?php
					}
				}
				?>
				<form action="admincreate.php" method="post">
					<input type="submit" value="Create a new user account">
				</form>
				&nbsp;
				<form action="logout.php" method="post">
					<input type="submit" value="Log out">
				</form>
			</table>
		</div>
		<div class="fixed">
			<a href="#top">Go to top</a>
		</div>
	</body>
 </html>