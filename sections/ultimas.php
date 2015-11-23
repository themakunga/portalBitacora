<?php
$ultimas = ultimasEntradas();

?>
<div class="well col-lg-12">
	<h3>Ultimas Entradas</h3>
	<table class="table table-striped table-hover">
		<thead>
			<th>Descripcion</th>
			<th>Titulo</th>
			<th>Descripcion</th>
			<th>Inicio</th>
			<th>Término</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php
				while($list = mysql_fetch_array($ultimas)){
					echo "<tr><td width='12%'>".$list['tipo']."</td>";
					echo "<td width='20%'>".$list['titulo']."</td>";
					echo "<td>".$list['descripcion']."</td>";
					echo "<td width='7%'>".$list['inicio']."</td>";
					echo "<td width='7%'>".$list['fin']."</td>";
					echo "<td width='8%'>".iconosLista($list['id'])."</td></tr>";
				}
			?>
		</tbody>
	</table>
</div>
