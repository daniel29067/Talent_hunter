<?php
session_start();

extract($_GET);



$id = $_GET["id"];



function eliminar($idPr)
{
	$sql = "delete from proveedor where id_pr=$idPr";
	echo $sql;
	$conn = mysqli_connect('localhost', 'root', '','toto_tb');

	mysqli_query($conn,$sql);
}

?>

<?php
$cargosesion = $_SESSION['CARGO'];
eliminar($id);
header("location:conpr.php?cargo=$cargosesion");

 ?>
