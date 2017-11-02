<!DOCTYPE html>
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
		<h1>Log in</h1>
	</div>
	
	<form action="login.php" method="post"> 
		<input type="text" name="account" placeholder="Account"><br>
		<br>
		<input type="password" name="password" placeholder="Password"><br>
		<br>
		<input type="submit" value="Sign In"> 
	</form>	 
	<p>Don't have an account yet?</p>
	<a href="register.php">Sign up now</a>
	<br><br><br>
	<div class="myMOUSE2">
		<img src="http://hitwebcounter.com/counter/counter.php?page=6797908&style=0010&nbdigits=4&type=page&initCount=0" title="free hits" Alt="free hits"   border="0">
	</div>
	<div class="fixed myMOUSE1">
		Photo credits by Harry Hong
	</div>
</body>
</html>