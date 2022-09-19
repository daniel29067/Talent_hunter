<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Login</title>
    <link rel="shortcut icon" href="../vista/img/talent_hunter7-removebg-preview.png">
</head>
<body>
<img src="../vista/img/talent_hunter6.png"/> 
    <form action="../modelo/validar.php"  method="post">
        <ul>
            <li>
              <label for="mail">Correo electrónico:</label>
              <input type="email" name="user_mail">
            </li>
            <li>
              <label for="password">Password:</label>
              <input type="password" name="user_passwd">
            </li>
            <li>
                <input type="submit" name="signup" value="LogIn" />
            </li>
         </ul>
    </form>
  <a href="../controlador/registro.php">¿Nuevo usuario?Registrese</a>
</body>
</html>