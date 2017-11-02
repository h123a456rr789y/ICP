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
		<h1>Register</h1>
	</div>
	<form action="signup.php" method="post">
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
		<input type="submit" value="Sign up">
		<br>
	</form>	 
	<p>Already have a account?</p>
	<a href="index.php">Sign in now</a>

	<div class="fixed myMOUSE1">
		Photo credits by Harry Hong
	</div>

</body>
</html>