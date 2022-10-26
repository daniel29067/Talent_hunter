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
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
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
        <link rel="stylesheet" href="../vista/css/estiloprodep.css">
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

        <nav class="navbar navbar-expand-md bg-white border border-1 border-secondary rounded-bottom shadow">

            <div class="container-fluid px-5" id="enca">

                <!-- icono -->
                <span class="navbar-brand mb-0 h3">
                    <img src="../vista/img/2.png" alt="Logo" width="50" class="d-inline-block align-text-center rounded">
                </span>

                <!--boton del menu -->



                <?php
                include("../modelo/connect_db.php");
                $query = "SELECT * from user where id_user=$_SESSION[id_user]";
                $resultado = $mysqli->query($query);
                while ($row = $resultado->fetch_assoc()) {
                ?>

                    <!-- boton configuracion -->

                    <a class="navbar-brand text-end" href="../controlador/configent.php">
                        <!--<img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/>   --->
                        <img height="50px" class="rounded-circle" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>" />&nbsp; <?php echo $row['name']; ?>
                    </a>

            </div>

        </nav>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


    <?php
                }
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $_SESSION['name']; ?></h3>
                            <!-- Consultar rol Image -->
                            <?php

                            $roldb = mysqli_query($mysqli, "SELECT * FROM rol WHERE id_rol = $_SESSION[id_rol]");
                            $rol = mysqli_fetch_array($roldb);
                            ?>

                            <p class="text-muted text-center"><?php echo $rol['des_rol']; ?></p>




                            <br>
                            <a href="chat.php?usuario=<?php echo $id; ?>"><input type="button" class="btn btn-default btn-block" name="dejarseguir" value="Enviar chat"></a>


                        </div> -->
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sobre Mi</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <strong><i class="fa fa-pencil margin-r-5"></i> DNI</strong>

<p>
    <?php echo "$_SESSION[id_user]" ?>
</p>

<hr>

<strong><i class="fa fa-pencil margin-r-5"></i> Email</strong>

<p>
    <?php echo "$_SESSION[email]" ?>
</p>

<hr>
                            <strong><i class="fa fa-pencil margin-r-5"></i> Descripción</strong>

                            <p>
                                <?php echo "$_SESSION[description]" ?>
                            </p>

                            <hr>
                            <strong><i class="fa fa-book margin-r-5"></i> Deporte</strong>

                            <p class="text-muted">
                                <?php echo "$_SESSION[deporte]" ?>
                            </p>

                            <hr>
                            <?php if ($_SESSION['id_rol'] == 1) { ?>
                                <strong><i class="fa fa-book margin-r-5"></i> Posicion</strong>

                                <p class="text-muted">
                                    <?php echo "$_SESSION[position]" ?>
                                </p>

                                <hr>
                            <?php } ?>

                            <?php

                            $paisdb = mysqli_query($mysqli, "SELECT * FROM pais WHERE id_pais = $_SESSION[pais]");
                            $pais = mysqli_fetch_array($paisdb);
                            ?>
                            <strong><i class="fa fa-map-marker margin-r-5"></i> Pais</strong>

                            <p class="text-muted"><?php echo "$pais[name_pais]" ?></p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Region</strong>

                            <p>
                                <?php echo "$_SESSION[region]" ?>
                            </p>

                            <hr>
                            <?php if ($_SESSION['id_rol'] == 1) { ?>
                                <a href="../controlador/actualizardep.php"><input type="button" name="actualizadep" value="Editar" /></a>
                            <?php } elseif ($_SESSION['id_rol'] == 2) { ?>
                                <a href="../controlador/actualizarent.php"><input type="button" name="actualizadep" value="Editar" /></a>
                            <?php } ?>
                            <?php if ($_SESSION['id_rol'] == 1) { ?>
                            <a href="../vista/eliminardep.php"><input type="button" name="delete" value="Eliminar cuenta"/></a>
                            <?php } elseif ($_SESSION['id_rol'] == 2) { ?>
                            <a href="../vista/eliminarent.php"><input type="button" name="delete" value="Eliminar cuenta"/></a>
                            <?php } ?>
                         <a href="../modelo/desconectar.php"><input type="button" name="logout" value="Logout" onclick="return Confirmlogout()"/></a>


                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        
                        <div class="tab-content">

                        <?php
            $pagina = isset($_GET['perfil']) ? strtolower($_GET['perfil']) : 'miactividad';
            require_once '../controlador/'.$pagina.'.php';
            ?>




                        </div>

                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    </body>

    </html>
<?php } ?>