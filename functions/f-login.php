<?php
require_once ('funciones.php');
session_start();
$turno = $_POST['turno'];

require_once ('funciones.php');
session_start();
$turno = $_POST['turno'];
if(isset($_POST['login'])){
		if($turno!="null"){
			if(!empty($_POST['usuario']) or !empty($_POST['password'])){
				$usuario = $_POST['usuario'];
				$password = md5($_POST['password']);
				$result = comprobarLogin($usuario,$password);
			
				if(mysql_num_rows($result)!=0){
					while($list = mysql_fetch_array($result)){
						if($list['level']!=5){
							$_SESSION['id'] = $list['id'];
							$_SESSION['turno'] = $turno;
							$_SESSION['usuario'] = $list['username'];
							$_SESSION['nombre'] = $list['fullname'];
							$_SESSION['permisos'] = $list['level'];
						}
						else{
							?>
						<script>
							window.alert("Usuario No habilitado para ingresar");
							location.href = "../index.php"; //volver al comienzo
						</script> 
					<?php
						}
					}
				?>
				<script>location.href = '../index.php';</script>";
				<?php
				}
				else {
					?>
						<script>
							window.alert("Nombre de Usuario o Clave Incorrectos");
							location.href = "../index.php"; //volver al comienzo
						</script> 
					<?php	
	
				}
				
			}
			else{
				?>
					<script>
						window.alert("No ha ingresado datos");
						location.href = "../index.php";
					</script> 
				<?php
			}
		}
		else{
			?>
				<script>
					window.alert("Ingrese Turno Válido");
					location.href = "../index.php";
				</script> 
			<?php
			
		}
		
		
	
}
else{
	?>
				<script>location.href = '../index.php';</script>";
				<?php
	
	
}

?>
				<script>location.href = '../index.php';</script>";
				<?php

?>