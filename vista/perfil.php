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
    // $pag = $_GET['perfil'];

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
                            <img class="profile-user-img img-responsive" src="../vista/img/profile_photos/<?php echo $use['profile_foto']; ?>" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $use['name']; ?></h3>
                            <!-- Consultar rol Image -->
                            <?php

                            $roldb = mysqli_query($mysqli, "SELECT * FROM rol WHERE id_rol = $use[id_rol]");
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

                            <strong><i class="fa fa-pencil margin-r-5"></i> Descripción</strong>

                            <p>
                                <?php echo "$use[description]" ?>
                            </p>

                            <hr>
                            <strong><i class="fa fa-book margin-r-5"></i> Deporte</strong>

                            <p class="text-muted">
                                <?php echo "$use[deporte]" ?>
                            </p>

                            <hr>
                            <?php if ($use['id_rol'] == 1) { ?>
                                <strong><i class="fa fa-book margin-r-5"></i> Posicion</strong>

                                <p class="text-muted">
                                    <?php echo "$use[position]" ?>
                                </p>

                                <hr>
                            <?php } ?>

                            <?php

                            $paisdb = mysqli_query($mysqli, "SELECT * FROM pais WHERE id_pais = $use[pais]");
                            $pais = mysqli_fetch_array($paisdb);
                            ?>
                            <strong><i class="fa fa-map-marker margin-r-5"></i> Pais</strong>

                            <p class="text-muted"><?php echo "$pais[name_pais]" ?></p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Region</strong>

                            <p>
                                <?php echo "$use[region]" ?>
                            </p>

                            <hr>


                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="<?php echo $pag == 'miactividad' ? 'active' : ''; ?>"><a href="?id=<?php echo $id; ?>&perfil=miactividad">Actividad</a></li>
                            <li class="<?php echo $pag == 'informacion' ? 'active' : ''; ?>"><a href="?id=<?php echo $id; ?>&perfil=informacion">Información</a></li>
                            <li class="<?php echo $pag == 'fotos' ? 'active' : ''; ?>"><a href="?id=<?php echo $id; ?>&perfil=fotos">Fotos</a></li>
                        </ul>
                        <div class="tab-content">






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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    </body>

    </html>
<?php } ?>