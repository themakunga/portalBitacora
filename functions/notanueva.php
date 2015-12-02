<?php
require_once('funciones.php');
require_once('conexion.php');
session_start();

if(isset($_POST['insertar'])){
		$ingreso = array( 	usuario => $_SESSION['id'],
							notas => utf8_encode($_POST['notas']),
							estado => $_POST['n_nivel'],
							importancia => $_POST['n_tipos']);
		inserta_nota($ingreso);


}
	header('Location: ../index.php#notas');
