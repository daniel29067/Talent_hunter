<?php
/*

		$mysqli = new MySQLi("localhost", "root","", "talent_hunter");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno()
			. ") " . $mysqli -> mysqli_connect_error());
	}
			//echo "Conexión exitossa!";

//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}*/
$servername = "localhost";
$database = "talent_hunter";
$username = "root";
$password = "";
// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
