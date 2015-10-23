<?php

require_once('funciones.php');
session_start();
if(isset($_POST['elimina'])){
	if(!empty($_POST['nota'])){
		foreach($_POST['nota'] as $id){
			newEstado_nota($id,$_SESSION['id']);
			
		}
	}
	header('Location: http://pconvm212/bitacora/#notas');
}else{
	/***/
}
?>