<body>
<?php
session_start();
require_once ('funciones.php');

if(isset($_POST['edit'])){
	$ingreso = array(texto => $_POST['texto'],
					estatus => $_POST['n_nivel'],
					tipo => $_POST['n_tipos'],
					usuario => $_SESSION['id'],
					id => $_POST['id']);
	//var_dump($ingreso);
		
	nota_edit($ingreso);
	?>
		<script>
			javascript:window.close();
		</script>
	<?php 
}else{
	if(isset($_POST['del'])){
		newEstado_nota($_POST['id'],$_SESSION['id']);

	}
	?>
		<script>
			javascript:window.close();
		</script>
	<?php
}

?>

	
</body>