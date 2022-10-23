<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Login</title>
    <link rel="shortcut icon" href="../vista/img/talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="../vista/css/estiloind.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  <div class="container w-75 bg-primary mt-5 rounded shadow">
    <div class="row align-items-stretch">
      <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded-left">

      </div>
      <div class="col bg-white p-4 rounded-end">
        <div class="text-end">
          <img src="../vista/img/talent_hunter6.png" width="50" alt="">
        </div>
        <h2 class="fw-bold text-center py-5">Bienvenidos</h2>
        <form action="../modelo/validar.php" method="post">

          <div class="mb-4">
            <label for="mail" class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" name="user_mail">
          </div>
          
          <div class="mb-4">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="user_passwd">            
          </div>

          <div class="d-grid">
            <input type="submit" class="btn btn-primary" name="signup" value="Login" />
          </div>

          <div class="my-3">
            <span>¿Nuevo usuario? <a href="../controlador/registro.php">Registrese</a></span>
            <br>
            <span><a href="../vista/resetpass.php">Recuperar Password</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>