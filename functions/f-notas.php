<?php

require_once('funciones.php');

$tipos = list_tipo_notas();
$estatus = list_estatus_notas();
//var_dump($estatus);
session_start();
if(isset($_POST['elimina'])){
	if(!empty($_POST['nota'])){
		foreach($_POST['nota'] as $id){
			newEstado_nota($id,$_SESSION['id']);
			
		}
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
	if(!empty($_POST['nota'])){
		//inserta_nota($_POST['nota'],$_POST['n_tipos'],$_POST['n_nivel'],$_SESSION['id']);
		echo $_POST['nota'];
		echo $_POST['n_tipos'];
		echo $_POST['n_nivel'];
		echo $_SESSION['id'];
		
		/*?>
			<script>
				window.close(); //volver al comienzo
			</script> 
		<?php*/
	}
}
?>