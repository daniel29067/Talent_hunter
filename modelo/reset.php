 <?php
    $mail = $_POST['mail'];
    require("../modelo/connect_db.php");
    $query = "SELECT passwd from user where email='$mail'";
    $resultado = $mysqli->query($query);
    $row = $resultado->fetch_assoc();
    //mensaje
    $para = $mail;

    // título
    $título = 'Reset password';

    // mensaje
    $mensaje = "
<html>
<head>
  <title>Reset password</title>
</head>
<body>
  <h1>Talent Hunter</h1>
  <img src='https://localhost/Talent_hunter/vista/img/talent_hunter7.png'>
  <div>
    <p>Reestablecer contraseña</p>
    <h3>su contraseña es: </h3>
    <?php echo $row[passwd]; ?>
    <p>Si no pidio el cambio por favor omitir</p>
  </div>

</body>
</html>
";

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    //$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
    $cabeceras .= 'From: lealtoledo72@gmail.com' . "\r\n";
    //$cabeceras .= 'Cc: lealtoledo72@gmail.com' . "\r\n";
    //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

    // Enviarlo
    mail($para, $título, $mensaje, $cabeceras);
    echo "<script>
		location.href='../vista/index.php'
	 </script>";
    ?>