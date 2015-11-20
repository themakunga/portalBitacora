<?php
session_start();
require_once ('funciones.php');

if(isset($_POST['edit'])){
	$ingreso = array(texto => $_POST['NotaEdDescripcion'],
					estatus => $_POST['NotaEdEstatus'],
					tipo => $_POST['NotaEdImportancia'],
					usuario => $_SESSION['id'],
					id => $_POST['NotaEdID']);
	//var_dump($ingreso);

	nota_edit($ingreso);
		header('Location: ../index.php#notas');
}else{
	if(isset($_POST['del'])){
		newEstado_nota($_POST['NotaEdID'],$_SESSION['id']);

	}
		header('Location: ../index.php#notas');
}

?>
