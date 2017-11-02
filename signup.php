<?php ob_start();?>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<link rel="stylesheet" type="text/css" href="DB_CSS.css">
<?php

	$db_host = "dbhome.cs.nctu.edu.tw";
	$db_name = "liyu6072_cs_hw1";
	$db_user = "liyu6072_cs";
	$db_password = "h110028";

	try{

		$conn=new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$conn->query('SET NAMES "utf8"');
		
		$account = $_POST['account'];	//injection
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        $name = $_POST['name'];
        $email = $_POST['email'];

	    if($account!=null && $password!=null && $conpassword!=null && $password==$conpassword && $name!=null && $email!=null)
	    {	//All field are required
	        if($password==$conpassword)
	        {	//Password not confirm
	            if(!preg_match("/ /",$account) && !preg_match("/ /",$password) && !preg_match("/ /",$email))
	            {	//Cannot have any space
	                if(strpos($email,'@') && strpos($email,'.'))
	                {   //Wrong email format
	                    $sqlSelect = "SELECT account FROM people WHERE account='$account' LIMIT 1";
	                    $results=$conn->query($sqlSelect);
	                    $row=$results->fetch();
	                    if($row[0] == $account){
	                        echo "<script type='text/javascript'>";
	                        echo "alert('Account has been used');";
	                        echo "window.location.href='register.php'";
	                        echo "</script>";
	                    }
	                    else{
	                        $hashpassword = hash('sha224',$password);
	                        $sqlSelect1 = "INSERT INTO people(account, password, name, email)
	                        values('$account','$hashpassword','$name','$email')";
	                        $func=$conn->prepare($sqlSelect1);
	                        $func->execute(array($account, $hashpassword, $name, $email));
	                        echo "<script type='text/javascript'>";
	                        echo "alert('Sign up success');";
	                        echo "window.location.href='index.php'";
	                        echo "</script>";
	                    }
	                } 
	                else{
	                    echo "<script type='text/javascript'>";
	                    echo "alert('Wrong email format');";
	                    echo "window.location.href='register.php'";
	                    echo "</script>";
	                }
	            }
	            else{
	            echo "<script type='text/javascript'>";
	            echo "alert('Cannot have any space');";
	            echo "window.location.href='register.php'";
	            echo "</script>";
	            }
	        }
	        else{
	            echo "<script type='text/javascript'>";
	            echo "alert('Password not confirm');";
	            echo "window.location.href='register.php'";
	            echo "</script>";
	        }
	    }
	    else{
	        echo "<script type='text/javascript'>";
	        echo "alert('All field are required');";
	        echo "window.location.href='register.php'";
	        echo "</script>";
	    }
	}
	catch(PDOException $e){
    	echo 'Caught exception: ', $msg = $e->getMessage(), "\n";
	}

?>
