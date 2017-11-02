<?php ob_start();?>
<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="DB_CSS.css">

<?php

	    $account = $_POST['account'];	
	    $password = $_POST['password'];

	if($account!=null && $password!= null && !preg_match( "/ /" , $account) && !preg_match( "/ /" , $password)){
		$db_host = "dbhome.cs.nctu.edu.tw";
		$db_name = "liyu6072_cs_hw1";
		$db_user = "liyu6072_cs";
		$db_password = "h110028";
		if(!@mysql_connect($db_host, $db_user, $db_password))
        die("無法對資料庫連線");

		try{
			
		    	$conn=new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
	   			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
				$conn->query('SET NAMES "UTF8"'); #not sure 
				$hashpassword= hash('sha224',$password);
				$sqlSelect="SELECT * FROM people WHERE account='$account' AND password='$hashpassword'";################  
				$func=$conn->prepare($sqlSelect);
				$func->execute();	
				if($func->rowCount()>0){
					$sqlSelect1="SELECT * FROM `people` WHERE account='$account' ";
					$results=$conn->query($sqlSelect1);
					$row=$results->fetch();
					if($row[5]==1){
						$_SESSION["admin"]=1;
						$_SESSION["account"]=$_POST['account'];
						header("Location: admin.php");
					}
					else{
						$_SESSION["admin"]=0;
						$_SESSION["account"]=$_POST['account'];
						header("Location: user.php");
					}
				}
				else{
					session_unset();
					session_destroy();
					echo "<script type='text/javascript'>";
				    echo "alert('Wrong account or password');";
				    echo "window.location.href='index.php'";
				    echo "</script>";
				}
		    }
		catch(PDOException $e){

		    $message=$e->getMessage();
		   	session_unset();
		    session_destroy();
		}
	}

	// elseif($account==null || $password== null){
	// 	echo "<script type='text/javascript'>";
	// 	echo "alert('Please typeing both account and password!');";
	// 	echo "window.location.herf='index.php'";
	// 	echo "</script>";
		

	// }
	// elseif(preg_match( "/ /" , $account) || preg_match( "/ /" , $password)){
	// 	echo "<script type='text/javascript'>";
	// 	echo "alert('Account or password can't content whitespace!');";
	// 	echo "window.location.herf='index.php'";
	// 	echo "</script>";

	// }
	else{
	    echo "<script type='text/javascript'>";
	    echo "alert('Wrong account or password');";
	    echo "window.location.href='index.php'";
	    echo "</script>";
	}

 ?>