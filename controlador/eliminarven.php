<?php
session_start();

extract($_GET);



$id = $_GET["id"];



function eliminar($id)
{
	$sql = "delete from venta where id_ve=$id";
	echo $sql;
	$conn = mysqli_connect('localhost', 'root', '','toto_tb');

	mysqli_query($conn,$sql);
}

?>

<?php
$cargosession = $_SESSION['CARGO'];
eliminar($id);
header("location:conven.php?cargo=$cargosession");

 ?>
