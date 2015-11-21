<?php
include('functions/funciones.php');

$dia = date('Y-m-d h:i:s');

$salida = mysql_fetch_row(turnoValida($dia, '2'));

var_dump($salida);

 ?>
