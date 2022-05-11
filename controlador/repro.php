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
	<title>TOTO TIRE|registrar productos</title>
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
    <legend  style="font-size: 18pt"><b>Registro de productos</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt"><b>marca</b></label>
      <input type="text" name="marca" class="form-control" placeholder="marca" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
    </div>
   
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>precio</b></label>
      <input type="text" name="precio" class="form-control"  required placeholder="precio" pattern="[0-9]*"/>
    </div>
    </div>

    <input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("../modelo/registropro.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>


</body>
</html>