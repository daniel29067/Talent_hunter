<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Reset password</title>
    <link rel="shortcut icon" href="../vista/img/talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="css/estilogeneral.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

<nav class="navbar bg-light border-bottom border-2 rounded-bottom">
    <div class="container-fluid px-5">
      <h2 id=title><b>Talent Hunter</b></h2>
    </div>
  </nav>

    <div class="container bg-white align-items-stretch rounded shadow" id="contenedor">

        <!-- Encabezado -->
        <div class="header">

            <div class="row pt-2 mt-5">
                <div class="col p-2">
                    <h4>Recupera tu cuenta</h4>
                </div>
                <hr>
            </div>

        </div>

        <!-- Cuerpo -->
        <div class="body px-5">
            
            <form action="../modelo/reset.php"  method="post">
                
                <div class="col">
                    <label for="mail">Ingrese su correo Electronico</label>
                    <input type="email" class="form-control" name="mail">
                </div>

        </div>

        <!-- Pie -->
        <div class="footer pt-4">

            <div class="row pb-3">

                <hr>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input class="btn btn-primary" type="submit" name="reset" value="Confirmar"/>
                    <input href="index.php" class="btn btn-secondary" type="submit" value="Cancelar">
                </div>

            </form>
                
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>