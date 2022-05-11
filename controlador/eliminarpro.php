<?php

session_start();

extract($_GET);



$id = $_GET["id"];



function eliminar($id)
{
	$sql = "delete from producto where id_pro=$id";
	echo $sql;
	$conn = mysqli_connect('localhost', 'root', '','toto_tb');

	mysqli_query($conn,$sql);
}
$cargosession = $_SESSION['CARGO'];
?>

<?php

eliminar($id);
header("location:conpro.php?cargo=$cargosession");

 ?>
