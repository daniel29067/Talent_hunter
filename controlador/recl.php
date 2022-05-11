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
	<title>TOTO TIRE|registrar cliente</title>
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
    <legend  style="font-size: 18pt"><b>Registro de clientes</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt"><b>nombre de cliente</b></label>
      <input type="text" name="clname" class="form-control" placeholder="nombre del cliente" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
    </div>
   
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>telefono</b></label>
      <input type="text" name="telcl" class="form-control"  required placeholder="telefono" pattern="[0-9]*"/>
    </div>
  
    <div class="form-group">
      <label style="font-size: 14pt"><b>direccion</b></label>
      <input type="text" name="dircl" class="form-control" required placeholder="direccion" />
    </div>
		 <div class="form-group">
      <label style="font-size: 14pt"><b>e-mail</b></label>
      <input type="email" name="emailcl" class="form-control" required placeholder="email" />
    </div>
    </div>

    <input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("../modelo/registrocl.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>


</body>
</html>
