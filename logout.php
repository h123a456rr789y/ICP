<?php ob_start();?>
<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="DB_CSS.css">
<?php session_unset();
	  session_destroy(); ?>
<?php header("Location: index.php") ?>