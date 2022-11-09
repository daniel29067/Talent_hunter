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
<?php
include("../modelo/connect_db.php");
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
   //  $pag = $_GET['perfil'];

    $infouser = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id'");
    $use = mysqli_fetch_array($infouser);
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Talent Hunter|<?php echo $use['name'] ?> </title>
        <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
        <link rel="stylesheet" href="../vista/css/estiloperfiva.css">
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

    <nav class="navbar border-bottom border-2 rounded-bottom">
        <div class="container-fluid px-5">

            <?php
            if($_SESSION['id_rol']==1){
            ?>

            <a href="../vista/profile_dep.php" id="title"><h2><b>Talent Hunter</b></h2></a>
            <?php
            }if($_SESSION['id_rol']=2){
            ?>
            <a href="../vista/profile_ent.php" id="title"><h2><b>Talent Hunter</b></h2></a>
            <?php }
            ?>
            
            <a class="navbar-brand text-end" href="../vista/perfilpriv.php">

                <div class="row justify-content-center align-items-center">

                    <div class="col p-0">

                        <!--<img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/>   --->
                        <img id="fot" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>"/>

                    </div>
                    
                    <div class="col">
                        
                        <h4 id="title"><?php echo  $_SESSION['name']; ?></h4>

                    </div>

                </div>

            </a>

        </div>
    </nav>

    <div class="container-fluid mt-1 mb-4">

        <div class="row justify-content-center m-2">

            <!-- inicio de contenedor Datos del Usuario -->

            <div class="col-lg-9 border border-1 rounded shadow m-3">

                <div class="row justify-content-around align-items-center py-3" id="informacion">

                    <div class="col-lg-5 d-flex justify-content-center align-items-center">
                        
                        <a class="navbar-brand text-end" href="../vista/perfilpriv.php">
                            <!--<img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/>   --->
                            <img id="foto" src="../vista/img/profile_photos/<?php echo $use['profile_foto']; ?>" />
                        </a>

                    </div>

                    <div class="col-lg-5" id="prueba">

                        <div class="row-fluid">

                            <div class="col" id="prueba1">

                                <b id="nombre">
                                    <?php 
                                    echo $use['name'];
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

                        </div>

                        <div class="row-fluid">

                            <!-- Consultar rol Image -->
                            <?php

                                $roldb = mysqli_query($mysqli, "SELECT * FROM rol WHERE id_rol = $use[id_rol]");
                                $rol = mysqli_fetch_array($roldb);

                            ?>

                            <h7 class="text-muted"><?php echo $rol['des_rol'];?></h7>

                        </div>

                    </div>

                    <div class="row justify-content-center border-2 border-top m-3 pt-2">
                        <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Descripción</strong> -->
                        <?php echo "$use[description]" ?>
                    </div>

                    <div class="row text-center border-2 border-top pt-2">

                        <div class="col-lg-3">

                            <strong><i class="fa fa-book margin-r-5"></i> Deporte</strong>
                    
                            <p class="text-muted">
                            <?php echo "$use[deporte]" ?>
                            </p>

                        </div>

                        <div class="col-lg-3">

                            <?php if ($use['id_rol'] == 1) { ?>

                            <strong><i class="fa fa-book margin-r-5"></i> Posicion</strong>

                            <p class="text-muted">
                            <?php echo "$use[position]" ?>
                            </p>

                            <?php } ?>

                        </div>

                        <div class="col-lg-3">

                            <?php

                            $paisdb = mysqli_query($mysqli, "SELECT * FROM pais WHERE id_pais = $use[pais]");
                            $pais = mysqli_fetch_array($paisdb);

                            ?>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Pais</strong>

                            <p class="text-muted"><?php echo "$pais[name_pais]" ?></p>

                        </div>

                        <div class="col-lg-3">

                            <strong><i class="fa fa-pencil margin-r-5"></i> Region</strong>

                            <p class="text-muted">
                            <?php echo "$use[region]" ?>
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center align-items-center px-3">

            <div class="col-lg-9 border border-3 rounded shadow" id="d">

                <div class="row rounded pt-1">

                    <ul class="nav nav-tabs align-items-center justify-content-center">
                        <li class="<?php echo $pag == 'miactividad' ? 'active' : ''; ?>"><a id="act" href="?id=<?php echo $id;?>&perfil=miactividad"><h4>Actividad</h4></a></li>
                    </ul> 

                </div>

            </div>

        </div>

        <div class="row px-3">

            <?php
            $pagina = isset($_GET['perfil']) ? strtolower($_GET['perfil']) : 'miactividad';
            require_once '../controlador/'.$pagina.'.php';
            ?>

        </div>

    </div>


    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>

<?php } ?>