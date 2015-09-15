<?php
require_once ('funciones.php');

$pass = md5($_POST['password1']);
$datos = array(
	"usuario" => $_POST['usuario'],
	"password" => $pass,
	"mail" => $_POST['mail'],
	"nombre" => $_POST['nombre']
	
);



if(isset($_POST['login'])){
	if($_POST['password1']==$_POST['password2']){
		if(!empty($_POST['usuario']) or !empty($_POST['nombre']) or !empty($_POST['password1']) or !empty($_POST['mail'])){
			crea_usuario($datos);
			?>
			<script>
				window.alert("Usuario Creado, espere a que un administrador se lo habilite");
				window.close(); //volver al comienzo
			</script> 
		<?php
		}
		else{
			?>
			<script>
				window.alert("No puede dejar campos vacios");
				location.href = "../index.php"; //volver al comienzo
			</script> 
		<?php
		}
	}
	else{
		?>
			<script>
				window.alert("Claves no coinciden");
				location.href = "../index.php"; //volver al comienzo
			</script> 
		<?php
	}
	
}
else{
	
	
}
?>