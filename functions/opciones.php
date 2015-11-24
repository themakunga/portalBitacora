<?php
include ('funciones.php');
if (isset($_POST['apertura'])) {
  set_bitacora(true);
  header('Location: ../index.php#panel');
}else{
  if(isset($_POST['cierre'])) {
    set_bitacora(false);
    header('Location: ../index.php#panel');
  }
}

 ?>
