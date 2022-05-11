<?php
session_start();

extract($_GET);



$id = $_GET["id"];



function eliminar($id)
{
	$sql = "delete from compra where id_co=$id";
	echo $sql;
	$conn = mysqli_connect('localhost', 'root', '','toto_tb');

	mysqli_query($conn,$sql);
}

?>

<?php
$sesioncargo = $_SESSION['CARGO'];
eliminar($id);
header("location:concom.php?cargo=$sesioncargo");

 ?>
