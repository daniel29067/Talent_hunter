<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Reset password</title>
    <link rel="shortcut icon" href="../vista/img/talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="css/estilorecu.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar bg-light border-bottom border-2 rounded-bottom" id=enca>
        <div class="container-fluid px-5">
            <h2 id=title><b>Talent Hunter</b></h2>
        </div>
    </nav>

    <!-- contenedor padre -->
    <div class="container bg-white mt-5 mb-4">
    
        <!-- Creamos una fila -->
        <div class="row mt-3 mx-2 justify-content-center">
      
            <!-- Creamos una columna  -->
            <div class="col-lg-6 border border-2 rounded">

                <!-- Encabezado -->
                <div class="row border-bottom border-3 rounded-2 text-center" id="enca">
                    <div class="col p-2">
                        <h4>Recupera tu cuenta</h4>
                    </div>
                </div>

                <div class="row">

                    <form action="../modelo/reset.php"  method="post">

                    <div class="col-lg-12 my-2">
                        <label for="mail">Ingrese su correo Electronico</label>
                        <input type="email" class="form-control" name="mail">
                    </div>

                </div>

                <div class="row pb-2">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input class="btn" type="submit" name="reset" id="btnn" value="Confirmar"/>
                        <input href="index.php" id="btnn" class="btn" type="submit" value="Cancelar">
                    </div>
                </div>

                    </form>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>