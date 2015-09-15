<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"  media="screen,projection"/></link>
<?php

require_once('../functions/funciones.php');
?>
<script>
function refreshParent() 
{
    window.opener.location.reload(true);
}
</script>
<body onunload="javascript:refreshParent()">
<form name = "notas-v" method="POST" action="../functions/f-revalidaNota.php">
	<table>
		<thead>
			<tr>
				<td>id</td>
				<td>fecha creacion</td>
				<td>descripcion</td>
				<td>usuario modificacion</td>
				<td>estatus</td>
				<td>nivel</td>
				<td>ultima modificacion</td>
				<td>chk</td>
			</tr>
		</thead>
<?php
		$res = ultimasNotas();
		while($lista=mysql_fetch_array($res)){
			echo '<tr><td>'.$lista['id'].'</td>
			<td>'.convertir_fecha($lista['fecha'],1).'</td>
			<td>'.$lista['descripcion'].'</td>
			<td>'.$lista['usuario'].'</td>
			<td>'.$lista['estado'].'</td>
			<td>'.$lista['importancia'].'</td>
			<td>'.fecha_visible($lista['modificacion'],1).'</td>
			<td><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td></tr>';
			
		}
			
					
?>
	</table>
	<span class="botonera">
		<input class="boton_pri" type="submit" name="actualiza" value="Revalidar Notas"/>
		<input class="boton_pri" type="submit" name="cerrar" value="Cerrar" onclick="javascript:window.close()"/>
	</span>
</form>
</body>
