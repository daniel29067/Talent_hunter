<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Reset password</title>
    <link rel="shortcut icon" href="../vista/img/talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="../vista/css/estilogeneral.css">
    <style>

        @font-face{
            font-family: 'Dancing';
            src: url(css/fuentes/Dancing_Script/DancingScript-VariableFont_wght.ttf);
        }

        #enca{
            align-items: center;
            display: flex;
            padding: 8px;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

    <div class="container bg-white w-50 mt-5 mb-5 rounded shadow">
        <div class="row align-items-stretch">

            <div class="header" id="enca">

                    <h4>Recupera tu Cuenta</h4>

            </div>

              <hr>

            <form action="../modelo/reset.php"  method="post">

                <div class="col">
                    <label for="mail">Ingrese su correo Electronico</label>
                    <input type="email" class="form-control" name="mail">
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end p-2">
                    <input class="btn btn-primary" type="submit" name="reset" value="Confirmar"/>
                    <input href="index.php" class="btn btn-secondary" type="submit" value="Cancelar">
                </div>             

            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>