<?php
require_once('../../functions/conexion.php');


function datosUser($id){
	$sql = mysql_query("SELECT * FROM usuarios WHERE id = '".$id."';");

	return $sql;
}



 ?>
