<?php
session_start();
require("connect_db.php");
$id_pub=$_GET['idpost'];

$sql = "delete from post where id_pub=$id_pub";
		echo $sql;
		
		mysqli_query($mysqli,$sql);
		echo "<script>
					alert('Post eliminado');
					location.href='../vista/perfilpriv.php';
</script>";
?>
