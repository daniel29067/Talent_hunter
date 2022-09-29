<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['email']) {
	header("Location:../vista/index.php");
}
?>
<script>
        function Confirmdelete() {
        var resp = confirm("¿Desea eliminar su cuenta?");
        if (resp == true){

            return true;
        }
        else {
            return false;
            if($_SESSION['id_rol']==1){
                location.href='../controlador/configdep.php';

             }
             else{
                location.href='../controlador/configent.php';
        }
      

    }
    }
</script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Delete</title>
    <link rel="shortcut icon" href="../vista/img/talent_hunter7-removebg-preview.png">
</head>
<body>
<img src="../vista/img/talent_hunter6.png"/> 
    <form action="../modelo/ejecutar_eliminar.php"  method="post">
        <ul>
              <label for="password">Ingrese su contraseña para confirmar:</label>
              <input type="password" name="delete_passwd">
            </li>
            <li>
                <input type="submit" name="delete" value="Delete" onclick="return Confirmdelete()"/>
            </li>
         </ul>
    </form>
</body>
</html>