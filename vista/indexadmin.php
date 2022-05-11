<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {

	header("Location:index.php");
}
require("../modelo/connect_db.php");
?>
<html>
<head>
	<title>TOTO TIRE|BIENVENIDO</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css\indexastyle.css" />

</head>
<body>
	<div class="menu">
		<?php
		include("menu.php");
		?>
	</div>
</body>
</html>
