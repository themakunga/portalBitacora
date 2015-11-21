<?php
session_start();
require ('funciones.php');
require ('conexion.php');

$fecha = date("Y-m-d");
$inicio = $_POST['inicio'];
$inicio = noTime($inicio);
$fin = $_POST['fin'];
$fin = noTime($fin);
$estado = designaEstado($inicio, $fin);

if (isset($_POST['ingresar'])) {
		$ingreso = array( 	'fecha' => $fecha,
					'inicio' => $inicio,
					'termino' => $fin,
					'proceso' => $_POST['proceso'],
					'usuario' => $_SESSION['id'],
					'estatus' => $estado,
					'turno' => $_SESSION['turno'],
					'titulo' => $_POST['titulo'],
					'descripcion' => $_POST['desc']);
			//	var_dump($ingreso);
			inserta_entrada($ingreso);

}else{
	if (isset($_POST['pendiente'])){
				$ingreso = array( 	'fecha' => $fecha,
					'inicio' => $inicio,
					'termino' => $fin,
					'proceso' => $_POST['proceso'],
					'usuario' => $_SESSION['id'],
					'estatus' => '5',
					'turno' => $_SESSION['turno'],
					'titulo' => $_POST['titulo'],
					'descripcion' => $_POST['desc']);

			inserta_entrada($ingreso);
			//var_dump($ingreso);
	}
}

header('Location: ../index.php#insertar');


?>
