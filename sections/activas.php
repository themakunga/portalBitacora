<?php
$ultimas = entradasEjecucion();

?>
<div class="col-lg-12">
<h3>Entradas Activas</h3>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th class="col-xs-1">ID</th>
			<th class="col-xs-8">Descripcion</th>
			<th class="col-xs-1">Desde</th>
			<th class="col-xs-1">Estatus</th>
			<th class="col-xs-1"></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			while($lista = mysql_fetch_array($ultimas)){
				echo '<tr>
						<td class="col-xs-1">'.$lista['id'].'</td>
						<td class="col-xs-8">'.$lista['descripcion'].'</td>
						<td class="col-xs-1">'.$lista['inicio'].'</td>
						<td class="col-xs-1">'.iconoPend($lista['id']).'</td>
						<td class="col-xs-1"><a href=javascript:newPopup("sections/popup-edit.php?edit='.$lista['id'].'"); class="btn btn-xs btn-success">Validar</a></td>
					</tr>';
			}
		?>
	</tbody>
</table>
</div>