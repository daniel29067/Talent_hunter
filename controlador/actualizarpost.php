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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Editar Post</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="../vista/css/estiloredepent.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar bg-light border-bottom border-2 rounded-bottom" id="enca">
        <div class="container-fluid px-5">
            <h2 id="title"> <b> Talent Hunter</b></h2>
        </div>
    </nav>

    <div class="container bg-white mt-5 mb-4">

        <!-- Creamos una fila -->
        <div class="row mt-3 mx-2 justify-content-center">

            <!-- Creamos una columna  -->
            <div class="col-lg-6 border border-2 rounded">

                <!-- Contenedor de registro -->
                <!-- Header -->

                <div class="row rounded border-bottom border-3 text-center py-2" id="enca">

                    <h3>Edición de Post</h3>

                </div>

                <div class="row pt-3">

                    <?php
                    extract($_GET);
                    require("../modelo/connect_db.php");

                    $query = "SELECT * from post where id_pub=$_GET[idpost]";
                    $resultado = $mysqli->query($query);
                    $row = $resultado->fetch_assoc(); ?>

                    <!-- Inicio de formulario -->
                    <form method="post" action="..\modelo\ejecutarpost.php?idpost=<?php echo $row['id_pub'] ?>" enctype="multipart/form-data">

                        <div class="row justify-content-center align-items-center">

                            <!--Fecha-->
                            <div class="col-lg-6 my-1">
                                <label>Fecha:</label>
                                <?php echo $row['fecha']; ?>
                            </div>


                        </div>

                        <div class="row justify-content-center align-items-center">


                            <?php
                            if ($_SESSION['id_rol'] == 1) {
                                if ($row['post'] != 0) {
                                    $info = new SplFileInfo($row['post']);
                                    $info2 = $info->getExtension();
                                    if ($info2 == 'mp4' || $info2 == 'mov' || $info2 == 'wmv' || $info2 == 'avi') {

                            ?>
                                        <video width="100%" height="100%" controls>
                                            <source src="../vista/publicaciones/<?php echo $row['post']; ?>">
                                        </video>
                                    <?php
                                    } else { ?>

                                        <img src="../vista/publicaciones/<?php echo $row['post']; ?>">

                                    <?php
                                    }
                                }
                            } elseif ($_SESSION['id_rol'] == 2) {
                                if ($row['post'] != 0) {
                                    $info = new SplFileInfo($row['post']);
                                    $info2 = $info->getExtension();
                                    if ($info2 == 'mp4' || $info2 == 'mov' || $info2 == 'wmv' || $info2 == 'avi') {

                                    ?>
                                        <video width="100%" height="100%" controls>
                                            <source src="../vista/publicaciones/<?php echo $row['post']; ?>">
                                        </video>
                                    <?php
                                    } else { ?>
                                        <img src="../vista/publicaciones/<?php echo $row['post']; ?>" width="100%">
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>




                        <div class="row">

                            <!--descripción-->
                            <div class="col-lg-12 my-1">
                                <label>Descripción:</label>
                                <textarea name="description" class="form-control"><?php echo $row['contenido']; ?></textarea>
                            </div>

                        </div>



                        <div class="row d-md-flex justify-content-md-end pb-3 text-end">

                            <div class="col-lg-12 my-1 mt-3">

                                <input class="btn" required type="submit" name="submit" value="Guardar" id="btnn" />
                                <a class="navbar-brand text-end" href="../vista/perfilpriv.php">
                                    <button type="button" class="btn" id="btnn">Cancelar</button>
                                </a>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>