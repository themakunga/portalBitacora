<?php
require('funciones.php');
session_start();
if (isset($_POST['finalizar'])) {
  $edit = array('id' => $_POST['EntEdID'],
                'inicio' => $_POST['EntEdInicio'],
                'fin' => $_POST['EntEdFin'],
                'titulo' => $_POST['EntEdTitulo'],
                'texto' => $_POST['EntEdDescripcion'],
                'usuario' => $_SESSION['id'],
                'estatus' => '3');
   edicion_entrada($edit);
	header('Location: ../index.php#insertar');
}else{
  if (isset($_POST['eliminar'])) {
    $borrar = array('id' => $_POST['EntEdID'],
                    'estatus' => '6');

    anula_entrada($borrar);
    header('Location: ../index.php#insertar');
  }
}
header('Location: ../index.php#insertar');
 ?>
