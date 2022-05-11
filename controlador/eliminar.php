<?php
session_start();

extract($_GET);



$id = $_GET["id"];



function eliminar($id)
{
	$sql = "delete from user_tb where id=$id";
	echo $sql;
	$conn = mysqli_connect('localhost', 'root', '','toto_tb');

	mysqli_query($conn,$sql);
}

?>

<?php
$cargosesion = $_SESSION['CARGO'];
eliminar($id);
header("location:consult.php?cargo=$cargosesion");

 ?>
