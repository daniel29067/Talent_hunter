<!DOCTYPE html>
<html>
<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../vista/index.php");
}
?>
<head>

	<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="css\acem.css">
	<title>TOTO TIRE|registrar</title>
</head>
<body  >
<div class="menu"style=" background: #ffffff;">
 <?php
include("../vista/menu.php");
?>
</div>

<!-- formulario registro -->

<form method="post" action="" >
  <fieldset>
    <legend  style="font-size: 18pt"><b>Registro</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Ingrese nombre del empleado </b></label>
      <input type="text" name="username" class="form-control" placeholder="Ingresa tu nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Ingresa tu cargo</b></label>
      <input type="text" name="cargo" class="form-control"  required placeholder="Ingresa cargo" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+"/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Ingresa tu Password</b></label>
      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Repite tu contraseña</b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
    </div>
		<div class="form-group">
			<label style="font-size: 14pt"><b>ingresa tu e-mail</b></label>
			<input type="email" name="email" class="form-control" required placeholder="ingresa tu email" />
		</div>
    </div>

    <input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("../modelo/registro.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>


</body>
</html>
