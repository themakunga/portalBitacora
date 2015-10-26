<?php
$ultimas = entradasEjecucion();

?>
<div class="col-lg-12">
<h3>Entradas Activas</h3>
<table>
	<thead>
		<tr>
			<td class="col-xs-1">#</td>
			<td class="col-xs-1">Grupo</td>
			<td class="col-xs-2">Titulo</td>
			<td class="col-xs-6">Descripcion</td>
			<td class="col-xs-1">Hora Inicio</td>
			<td class="col-xs-1">Estatus</td>
		</tr>
	</thead>
	<tbody>
		<?php 
			while($lista = mysql_fetch_array($ultimas)){
				echo '<tr class="warning">
						<td><a href=javascript:newPopup("sections/popup-edit.php?edit='.$lista['id'].'");></td>
						<td>'.$lista['tipo'].'</td>
						<td>'.$lista['titulo'].'</td>
						<td>'.$lista['descripcion'].'</td>
						<td>'.$lista['inicio'].'</td>
						<td>'.$lista['estatus'].'</td>
					</tr>';
			}
		?>
	</tbody>
</table>
</div>