<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['start'])) {

    //Set the session start time

    $_SESSION['start'] = time();
}
if (@!$_SESSION['email']) {
    header("Location:../vista/index.php");
} else {
    if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 300)) {

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
    function Confirmlogout() {
        var resp = confirm("¿Desea Cerrar la sesion?");
        if (resp == true){

            return true;
        }
        else {
             return false;
        }

    }
    </script>
<?php
include("../modelo/connect_db.php");

    $id = mysqli_real_escape_string($mysqli, $_SESSION['id_user']);
   // $pag = $_GET['perfil'];

    $infouser = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id'");
    $use = mysqli_fetch_array($infouser);
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Talent Hunter|<?php echo $_SESSION['name'] ?>  configuracion</title>
        <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
        <link rel="stylesheet" href="../vista/css/estiloprepri.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src:"../js/jquery.jscroll.js"></script>
        <style>
            .scroll {
                width: 100%;
            }

            .scroll .jscroll-loading {
                width: 10%;
                margin: -500px auto;

            }
        </style>
    </head>

    <body>

    <!-- encabezado de pagina -->

    <nav class="navbar border-bottom p-0 border-2 rounded-bottom">

        <div class="container-fluid px-5">

            <?php

            include("../modelo/connect_db.php");
            $query = "SELECT * from user where id_user=$_SESSION[id_user]";
            $resultado = $mysqli->query($query);

            while ($row = $resultado->fetch_assoc()) {

            if($_SESSION['id_rol']==1){

            ?>

            <a class="navbar-brand" href="../vista/profile_dep.php" id="title">

                <h2><b>Talent Hunter</b></h2> 
            
            </a>

            <?php

            }if($_SESSION['id_rol']==2){

            ?>

            <a class="navbar-brand" href="../vista/profile_dep.php" id="title">

                <h2><b>Talent Hunter</b></h2> 

            </a>

            <?php 
            }
            }   
            ?>

        </div>

    </nav>

    <!-- Contenedor Padre -->

    <div class="container-fluid bg-white mt-1 mb-4" >

        <div class="row justify-content-between">

            <!-- Contenedor Hijo a la izquierda -->
            <div class="col-lg-4 p-0 bg-white">

                <div class="row border border-3 shadow rounded m-3">

                    <!-- Creamos una fila para agregar dos columnas para la Imagen de perfil, nombre, rol y chat -->
                    <div class="row-fluid" id="informacion">

                        <div class="row border-bottom border-2 p-1 d-flex justify-content-center align-items-center">

                            <!-- Columna de imagen -->
                            <div class="col-lg-6 d-flex justify-content-center align-items-center ">
                        
                                <!-- boton configuracion -->
                                <a class="navbar-brand text-end" href="../vista/perfilpriv.php">
                                    <!--<img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/>   --->
                                    <img id="foto" height="130px" class=" rounded-circle" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>" />
                                </a>                      
                    
                            </div>
                    
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

                            <!-- columna nombre, rol, chat -->

                            <div class="col-lg-6 " id="prueba">

                                <!-- creamos una fila para poder crear una columna -->
                                <div class="row pt-3">

                                    <!-- columna nombre, chat -->
                                    <div class="col d-inline" id="prueba1">
                
                                        <b id="nombre">
                                        <?php 
                                        echo $_SESSION['name'];
                                        ?>
                                        </b>
                

                                        &nbsp;

                                        <a href="chat.php?usuario=<?php echo $id; ?>">
                
                                            <!-- <input type="button" class="btn btn-default btn-block" name="dejarseguir" value="Enviar chat"></a> -->

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                        </a>

                                    </div>

                                    <!-- rol -->

                                    <div class="row-fluid">
                        
                                    <?php

                                    $roldb = mysqli_query($mysqli, "SELECT * FROM rol WHERE id_rol = $_SESSION[id_rol]");
                                    $rol = mysqli_fetch_array($roldb);

                                    echo $rol['des_rol']; 

                                    ?> 

                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="p-3">
                            <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Descripción</strong> -->
                            <?php echo "$_SESSION[description]" ?>
                        </div>
                    
                    </div>

                </div>

                <div class="row-fluid border border-3 shadow rounded m-3">

                    <div class="row-fluid border-bottom rounded text-center" id="d">
                        
                        <h4>Datos</h4> 

                    </div>

                    <div class="row-fluid">
                        
                        <div class="row justify-content-center align-items-center">
                            
                            <div class="col-lg-5 text-center">

                                <strong><i class="fa fa-book margin-r-5"></i> Deporte</strong>
                    
                                <p class="text-muted">
                                <?php echo "$_SESSION[deporte]" ?>
                                </p> 

                                <?php if ($_SESSION['id_rol'] == 1) { ?>

                                <strong><i class="fa fa-book margin-r-5"></i> Posicion</strong>

                                <p class="text-muted">
                                <?php echo "$_SESSION[position]" ?>
                                </p>


                                <?php } ?>

                                <?php

                                $paisdb = mysqli_query($mysqli, "SELECT * FROM pais WHERE id_pais = $_SESSION[pais]");
                                $pais = mysqli_fetch_array($paisdb);

                                ?>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Pais</strong>

                                <p class="text-muted"><?php echo "$pais[name_pais]" ?></p>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Region</strong>

                                <p class="text-muted">
                                <?php echo "$_SESSION[region]" ?>
                                </p>

                            </div>

                            <div class="col-lg-7">

                                <div class="row-fluid m-3">

                                <?php if ($_SESSION['id_rol'] == 1) { ?>
                                    
                                    <a href="../controlador/actualizardep.php" id="btnn">
                                        <button type="button" class="btn" name="actualizadep" value="Editar">Editar</button>
                                        <!-- <input type="button" class="btn btn-primary" name="actualizadep" value="Editar" /> -->
                                    </a>

                                <?php } elseif ($_SESSION['id_rol'] == 2) { ?>

                                    <a href="../controlador/actualizarent.php" id="btnn">
                                        <button type="button" class="btn" name="actualizadep" value="Editar">Editar</button>
                                        <!-- <input type="button" class="btn btn-primary" name="actualizadep" value="Editar" /> -->
                                    </a>

                                <?php } ?>

                                </div>

                                <div class="row-fluid m-3">

                                <?php if ($_SESSION['id_rol'] == 1) { ?>

                                    <a href="../vista/eliminardep.php" id="btnn">
                                        <button type="button" class="btn" name="delete" value="Eliminar cuenta">Eliminar cuenta</button>
                                        <!-- <input type="button" class="btn btn-primary" name="delete" value="Eliminar cuenta"/> -->
                                    </a>
                                    
                                <?php } elseif ($_SESSION['id_rol'] == 2) { ?>

                                    <a href="../vista/eliminarent.php" id="btnn">
                                        <button type="button" class="btn" name="delete" value="Eliminar cuenta">Eliminar cuenta</button>
                                        <!-- <input type="button" class="btn btn-primary" name="delete" value="Eliminar cuenta"/> -->
                                    </a>

                                <?php } ?>

                                </div>

                                <div class="row-fluid m-3">

                                    <a href="../modelo/desconectar.php" id="btnn">
                                        <button type="button" class="btn" name="logout" value="Logout" onclick="return Confirmlogout()">Cerrar Sesión</button>
                                        <!-- <input type="button" class="btn btn-primary" name="logout" value="Logout" onclick="return Confirmlogout()"/> -->
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

            <!-- fin contenedor hijo a  la izquierda -->

            <div class="col-lg-7 ">

                <div class="row mx-1 mt-3 border border-3 rounded shadow">

                <!-- /.col -->
                <ul class="nav nav-tabs">
                    <li class="<?php echo $pag == 'actividad' ? 'active' : ''; ?>"><a href="?id=<?php echo $_SESSION['id_user'];?>&perfil=actividad">Actividad</a></li>
                </ul>

                <?php
                $pagina = isset($_GET['perfil']) ? strtolower($_GET['perfil']) : 'actividad';
                require_once '../controlador/actividad.php';
                ?>

                </div>

            </div>

        </div>
        
    </div>

    </body>

</html>
