<?php
require_once('funciones.php');
require_once('conexion.php');
session_start();

if(isset($_POST['insertar'])){
	if(!empty($_POST['notas'])){
		$ingreso = array( 	usuario => $_SESSION['id'],
							notas => $_POST['notas'],
							estado => $_POST['n_nivel'],
							importancia => $_POST['n_tipos']);
		inserta_nota($ingreso);
		
	}
	?>
		<script>
			javascript:window.close();
		</script>
	<?php 
}