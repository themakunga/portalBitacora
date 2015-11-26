<?php
$ultimas = ultimasEntradas();

?>
<div class="well col-lg-12">
	<h3>Ultimas Entradas</h3>
	<table class="table table-striped table-hover">
		<thead>
			<th class="col-xs-2">Grupo</th>
			<th class="col-xs-2">Titulo</th>
			<th class="col-xs-5">Descripcion</th>
			<th class="col-xs-1">Inicio</th>
			<th class="col-xs-1">Término</th>
			<th class="col-xs-1">Status</th>
		</thead>
		<tbody>
			<?php
				while($list = mysql_fetch_array($ultimas)){
					echo "<tr><td class='col-xs-2'>".$list['tipo']."</td>";
					echo "<td class='col-xs-2'>".utf8_decode($list['titulo'])."</td>";
					echo "<td class='col-xs-5'>".utf8_decode($list['descripcion'])."</td>";
					echo "<td class='col-xs-1'>".$list['inicio']."</td>";
					echo "<td class='col-xs-1'>".$list['fin']."</td>";
					echo "<td class='col-xs-1'>".iconosLista($list['id'])."</td></tr>";
				}
			?>
		</tbody>
	</table>
</div>
