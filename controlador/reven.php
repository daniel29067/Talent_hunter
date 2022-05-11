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
	<title>TOTO TIRE|registrar ventas</title>
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
    <legend  style="font-size: 18pt"><b>Registro de ventas</b></legend>
       <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>fecha pedido</b></label>
      <input type="date" name="fe_pe" class="form-control"  required placeholder="fecha pedido "/>
    </div> 
    <div class="form-group">
      <label style="font-size: 14pt"><b>fecha entrega</b></label>
      <input type="date" name="fe_en" class="form-control" placeholder="fecha entrega" />
    </div>
     <div class="form-group">
      <label style="font-size: 14pt"><b>cantidad</b></label>
      <input type="text" name="cantidad_ve" class="form-control" placeholder="cantidad"  pattern="[0-9]*"/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>total_venta</b></label>
      <input type="text" name="total_ve" class="form-control" placeholder="total_ve" pattern="[0-9]*"/>
    </div>
    </div>

    <input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("../modelo/registroven.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>


</body>
</html>