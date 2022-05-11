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
	<title>TOTO TIRE|registrar proveedores</title>
</head>
<body  >
<div class="menu"style=" background: #ffffff;">
 <?php
include("../vista/menu.php");
?>
</div>

<form method="post" action="" >
  <fieldset>
    <legend  style="font-size: 18pt"><b>Registro de proveedores</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt"><b>empresa</b></label>
      <input type="text" name="emp" class="form-control" placeholder="empresa" />
    </div>
   
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>telefono</b></label>
      <input type="text" name="telpr" class="form-control"  required placeholder="telefono" pattern="[0-9]*"/>
    </div>
  
    <div class="form-group">
      <label style="font-size: 14pt"><b>direccion</b></label>
      <input type="text" name="dirpr" class="form-control" required placeholder="direccion" />
    </div>
		 <div class="form-group">
      <label style="font-size: 14pt"><b>pagina web</b></label>
      <input type="text" name="pag_web" class="form-control" required placeholder="pag_web" />
    </div>
    </div>

    <input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("../modelo/registropr.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>


</body>
</html>
