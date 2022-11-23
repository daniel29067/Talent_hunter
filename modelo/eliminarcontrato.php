<?php
session_start();
require("connect_db.php");
$id_c=$_GET['idcontrato'];

$sql = "delete from contratos where id_contrato=$id_c";
	
		
		mysqli_query($mysqli,$sql);
        $sql2 ="UPDATE user SET id_estado=1 where id_user=$_GET[iddep]";		
		mysqli_query($mysqli,$sql2);
		echo "<script>
					alert('Contrato eliminado');
					location.href='../vista/contratos.php';
</script>";
?>