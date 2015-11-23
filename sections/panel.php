<?php
$usuario = $_SESSION['nombre'];
$saludo = saludoNew(date('h:m'));
$bitacora = UltimaBitacora();
$botonBitacora = botonBitacora($bitacora);
?>

<div class="well container">
  <h2><?php echo $saludo;?></h2> <h3><?php echo $usuario; ?></h3>
  <p>
    <form class="" action="functions/opciones.php" method="post">
  <?php echo $botonBitacora; ?>
    </form>
  </p>
<p>
<h3>Estado de Bitacora <small></small></h3>
  <?php

    echo totalesEstatus(mysql_result($bitacora, 0));
  ?>
  <div class="col-xs-3">
    <span class="label label-success"> Entradas Ejecutadas y Finalizadas </span>
  </div>
  <div class="col-xs-3">
    <span class="label label-primary"> Entradas En Ejecucion </span>
  </div>
  <div class="col-xs-3">
    <span class="label label-warning"> Entradas Pendientes </span>
  </div>
  <div class="col-xs-3">
    <span class="label label-danger"> Entradas Eliminadas </span>
  </div>
</p>
</div>
