<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Registro</title>
    <link rel="shortcut icon" href="../vista/img/talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="../vista/css/estiloregistrog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar bg-light border-bottom border-2 rounded-bottom" id="enca" >
        <div class="container-fluid px-5">
            <h2 id="title"><b>Talent Hunter</b></h2>
            <a class="navbar-brand text-end" href="../vista/index.php">
                <button type="button" class="btn" id="btnn">Iniciar Sesión</button>
            </a>
        </div>
    </nav>

    <div class="container">
        <a href="../controlador/registrodep.php" name="create_dep" value="Deportista">
            <div class="card">
                <img src="../vista/img/fondos-deportivos-en-vectores-gratis.jpg">
                <b><h3>Deportista</h3></b>
                <p>Con esta opcion podras registrarte como un jugador, 
                    teniendo la oportunidad de jugar con una entidad 
                    deportiva que le guste.</p>
            </div>
        </a>
        <a href="../controlador/registroent.php" name="create_ent" value="Entidad">
            <div class="card">
                <img src="../vista/img/icono-de-la-línea-del-estadio-deportivo-cartel-arena-complejo-vector-símbolo-concepto-esquema-colorido-delgada-azul-y-naranja-163627333.jpg">
                </b><h3>Entidad</h3></b>
                <p>Con esta opcion podras registrarte como una Entidad, 
                    teniendo la oportunidad de encontrar nuevos jugadores 
                    potenciales para su equipo.</p>
            </div>
        </a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>