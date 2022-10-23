<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['start']))
{

    //Set the session start time

    $_SESSION['start'] = time();

}
if (@!$_SESSION['email']) {
	header("Location:../vista/index.php");
}
else{if (isset($_SESSION['start']) && (time() - $_SESSION['start'] >10)) {

    //Unset the session variables

    session_unset();

    //Destroy the session

    session_destroy();
    echo "<script>
    alert('Sesion cerrada por inactividad') 
 </script>";
    header("Location:../vista/index.php");
    

}

}
?>
<script>
    function Confirmdelete() {
        var resp = confirm("¿Desea eliminar su cuenta?");
       
            if (resp == true) {

                return true;
            } else {

                location.href = '../vista/profile_dep.php'
                return false;

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
    <img src="../vista/img/talent_hunter6.png" />
    <form action="../modelo/ejecutar_eliminardep.php" method="post">
        <ul>
            <label for="password">Ingrese su contraseña para confirmar:</label>
            <input type="password" name="delete_passwd" required>
            </li>
            <li>
                <input type="submit" name="delete" value="Delete" onclick="return Confirmdelete()" />
            </li>
        </ul>
    </form>
</body>

</html>