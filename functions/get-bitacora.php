<?php
require_once ('funciones.php');
$bitacora = $_GET['bitacora'];
$dia = entradaTurno("1","$bitacora");
$tarde = entradaTurno("2","$bitacora");
$noche = entradaTurno("3","$bitacora");
 ?>
<table class="table table-striped table-hover">
		<thead>
			<tr><h4 align="center"><i class="fa fa-coffee"></i> Turno Mañana</h4></tr>
			<tr><th class="col-xs-2">Grupo</th>
			<th class="col-xs-2">Titulo</th>
			<th class="col-xs-5">Descripcion</th>
			<th class="col-xs-1">Inicio</th>
			<th class="col-xs-1">Término</th>
			<th class="col-xs-1">Status</th></tr>
		</thead>
		<tbody>
			<?php
				while($lista1 = mysql_fetch_array($dia)){
					echo "<tr><td class='col-xs-2'>".$lista1['tipo']."</td>";
					echo utf8_decode("<td class='col-xs-2'>".$lista1['titulo']."</td>");
					echo utf8_decode("<td class='col-xs-5'>".$lista1['descripcion']."</td>");
					echo "<td class='col-xs-1'>".$lista1['inicio']."</td>";
					echo "<td class='col-xs-1'>".$lista1['fin']."</td>";
					echo "<td class='col-xs-1'>".$lista1['estatus']."</td></tr>";
				}
			?>
		</tbody>

</table>
<table class="table table-striped table-hover">
		<thead>
			<tr><h4 align="center"><i class="fa fa-sun-o"></i> Turno Tarde</h4></tr>
			<tr><th class="col-xs-2">Grupo</th>
			<th class="col-xs-2">Titulo</th>
			<th class="col-xs-5">Descripcion</th>
			<th class="col-xs-1">Inicio</th>
			<th class="col-xs-1">Término</th>
			<th class="col-xs-1">Status</th></tr>
		</thead>
		<tbody>
			<?php
				while($lista1 = mysql_fetch_array($tarde)){
					echo "<tr><td class='col-xs-2'>".$lista1['tipo']."</td>";
					echo utf8_decode("<td class='col-xs-2'>".$lista1['titulo']."</td>");
					echo utf8_decode("<td class='col-xs-5'>".$lista1['descripcion']."</td>");
					echo "<td class='col-xs-1'>".$lista1['inicio']."</td>";
					echo "<td class='col-xs-1'>".$lista1['fin']."</td>";
					echo "<td class='col-xs-1'>".$lista1['estatus']."</td></tr>";
				}
			?>
		</tbody>

</table>
<table class="table table-striped table-hover">
				<thead>
					<tr><h4 align="center"><i class="fa fa-moon-o"></i> Turno Noche</h4></tr>
					<tr><th class="col-xs-2">Grupo</th>
					<th class="col-xs-2">Titulo</th>
					<th class="col-xs-5">Descripcion</th>
					<th class="col-xs-1">Inicio</th>
					<th class="col-xs-1">Término</th>
					<th class="col-xs-1">Status</th></tr>
				</thead>
				<tbody>
					<?php
						while($lista1 = mysql_fetch_array($noche)){
							echo "<tr><td class='col-xs-2'>".$lista1['tipo']."</td>";
							echo utf8_decode("<td class='col-xs-2'>".$lista1['titulo']."</td>");
							echo utf8_decode("<td class='col-xs-5'>".$lista1['descripcion']."</td>");
							echo "<td class='col-xs-1'>".$lista1['inicio']."</td>";
							echo "<td class='col-xs-1'>".$lista1['fin']."</td>";
							echo "<td class='col-xs-1'>".$lista1['estatus']."</td></tr>";
						}
					?>
				</tbody>

		</table>
