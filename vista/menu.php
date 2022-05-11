<!DOCTYPE html>
<html>
<head>
  <!--<link rel="stylesheet" type="text/css" href="css\menu.css" />-->
  <link rel="stylesheet" type="text/css" href="css\indexastyle.css" />

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<?php
  if (@!$_SESSION['user']) {
    header("Location:index.php");
  }
  require("../modelo/connect_db.php");

  ?>
  <img src="css\domicilios.JPG" alt="escudo" align="left" />
  <div id="header">
    <ul class="nav">

  <?php

  $user = $_SESSION['user'];
  $sql= "select cargo from user_tb where user = '$user'";
  $ressql=mysqli_query($mysqli,$sql);
  while ($row=mysqli_fetch_row($ressql)){
    $cargo=$row[0];
  }
  if ($cargo == 'admin')
  {
    ?>

        <li><a href="../vista/indexadmin.php">Inicio</a></li>
        <li><a href="">Empleados</a>
          <ul>
            <li><a href="../controlador/reuser.php">registrar</a></li>
            <li><a href="../controlador/consult.php?cargo=<?php echo $cargo ?>">consultar</a>
            </ul>
          </li>
          <li><a href="">Clientes</a>
            <ul>
              <li><a href="../controlador/recl.php">registrar</a></li>
              <li><a href="../controlador/concl.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Proveedores</a>
            <ul>
              <li><a href="../controlador/repr.php">registrar</a></li>
              <li><a href="../controlador/conpr.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Productos</a>
            <ul>
              <li><a href="../controlador/repro.php">registrar</a></li>
              <li><a href="../controlador/conpro.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Compras</a>
            <ul>
              <li><a href="../controlador/recom.php">registrar</a></li>
              <li><a href="../controlador/concom.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Ventas</a>
            <ul>
              <li><a href="../controlador/reven.php">registrar</a></li>
              <li><a href="../controlador/conven.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="../modelo/desconectar.php">Cerrar sesion</a></li>
        </div>
      </ul>

      <?php
    }else if ($cargo == 'ventas')


    {
      ?>
          <li><a href="../vista/indexadmin.php">Inicio</a></li>
          <li><a href="">Clientes</a>
            <ul>
              <li><a href="../controlador/concl.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Proveedores</a>
            <ul>
              <li><a href="../controlador/conpr.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Productos</a>
            <ul>
              <li><a href="../controlador/conpro.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Compras</a>
            <ul>
              <li><a href="../controlador/concom.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="">Ventas</a>
            <ul>
              <li><a href="../controlador/conven.php?cargo=<?php echo $cargo ?>">consultar</a></li>
            </ul>
          </li>
          <li><a href="../modelo/desconectar.php">Cerrar sesion</a></li>
        </ul>

      <?php

    }

    /*
    <ul class="nav pull-right">
    <li><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
    </ul>
    </div><!-- /.nav-collapse -->
    </div>
    </div><!-- /navbar-inner -->
    </div>*/
    ?>

        </div><!-- /.nav-collapse -->

  </head>
  </html>
