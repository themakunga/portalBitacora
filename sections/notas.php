<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"  media="screen,projection"/></link>
<link type="text/css" rel="stylesheet" href="../css/custom.css"  media="screen,projection"/>
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
<div class="well bs-component col-lg-12">
	<h2>Historial de Notas <small>ultimas 20 entradas</small></h2>
<form name = "notas-v" method="POST" action="../functions/f-revalidaNota.php">
	
	<span class="botonera pull-right">
		<input class="btn btn-success" type="submit" name="actualiza" value="Revalidar Notas"/>
		<input class="btn btn-default" type="submit" name="cerrar" value="Cerrar" onclick="javascript:window.close()"/>
	</span>
	<br>
	<table class="table table-striped table-hover table-fixed">
		<thead>
			<tr>
				<th class="col-xs-1">ID</th>
				<th class="col-xs-2">Fecha Creacion</th>
				<th class="col-xs-3">Descripcion</th>
				<th class="col-xs-2">Usuario Modificacion</th>
				<th class="col-xs-1">Estatus</th>
				<th class="col-xs-1">Nivel</th>
				<th class="col-xs-2">Ultima Modificacion</th>
				<th class="col-xs-0"></th>
			</tr>
		</thead>
		<tbody>
<?php
		$res = ultimasNotas();
		while($lista=mysql_fetch_array($res)){
			echo '<tr><td class="col-xs-1">'.$lista['id'].'</td>
			<td class="col-xs-2">'.convertir_fecha($lista['fecha'],1).'</td>
			<td class="col-xs-3">'.$lista['descripcion'].'</td>
			<td class="col-xs-2">'.$lista['usuario'].'</td>
			<td class="col-xs-1">'.$lista['estado'].'</td>
			<td class="col-xs-1">'.$lista['importancia'].'</td>
			<td class="col-xs-2">'.fecha_visible($lista['modificacion'],1).'</td>
			<td class="col-xs-0"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td></tr>';
			
		}
			
					
?>
	</tbody>
	</table>
	<br>
	<span class="botonera pull-right">
		<input class="btn btn-success" type="submit" name="actualiza" value="Revalidar Notas"/>
		<input class="btn btn-default" type="submit" name="cerrar" value="Cerrar" onclick="javascript:window.close()"/>
	</span>
</form>
</div>
</body>
