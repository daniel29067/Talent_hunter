<?php
session_start();

extract($_GET);



$id = $_GET["id"];



function eliminar($id)
{
	$sql = "delete from clientes where id_cl=$id";
	echo $sql;
	$conn = mysqli_connect('localhost', 'root', '','toto_tb');

	mysqli_query($conn,$sql);
}

?>

<?php
$cargosesion = $_SESSION['CARGO'];
eliminar($id);
header("location:concl.php?cargo=$cargosesion");

 ?>
