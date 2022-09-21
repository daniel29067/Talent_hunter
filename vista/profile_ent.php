<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['email']) {
	header("Location:../vista/index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Entidad</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
</head>
<body>
    <img src="..\vista\img\talent_hunter7.png"/>    
    <?php
        include("../modelo/connect_db.php");
        
        $query="SELECT * from user where id_user=$_SESSION[id_user]";
        $resultado=$mysqli->query($query);
        while ($row=$resultado->fetch_assoc()){
    ?>
    <img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/><br>
    <a href="../controlador/configent.php"><input type="button" name="conf" value="Configuracion" /></a>
    <h2><?php echo $row['name']; ?></h2>
    <h5><?php echo $row['description']; ?></h5>
    <?php
        }
    ?>
</body>
</html>