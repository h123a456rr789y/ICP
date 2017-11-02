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
   	$conn->query('SET NAMES "utf8"');

   	$account = $_GET['id'];
   	$sqlDelete = "DELETE  FROM people WHERE account='$account'";
   	$result = $conn->exec($sqlDelete);

   	header("Location: admin.php");

?>
