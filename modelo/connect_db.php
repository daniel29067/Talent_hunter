<?php

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
