<?php
$ultimas = entradasEjecucion();

?>
<div class="col-lg-6">
<h3>Entradas Activas</h3>
<table>
	<thead>
		<tr>
			<td>#</td>
			<td>Grupo</td>
			<td>Titulo</td>
			<td>Descripcion</td>
			<td>Hora Inicio</td>
			<td>Estatus</td>
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