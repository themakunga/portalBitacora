<?php
require_once ('functions/funciones.php');

$fecha = date("Y-m-d H:i:s");
echo $fecha;
$dia = entradaTurno($fecha,"1");
$tarde = entradaTurno($fecha,"2");
//$fecha = date("d-m-Y H:i:s", "29-07-2015 04:00:00");
if ($fecha <= strtotime(date("Y-m-d H:i:s", "00:00:00")) and $fecha >= strtotime(date("d-m-Y h:i:s", "07:00:00")) ){
	$fecha = date("d-m-Y",strtotime ( '-1 day' , strtotime ( $fecha ) ) );
}else{
	$fecha = $fecha;
}
$noche = entradaTurno($fecha,"3");




?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="exportar">
<table class="table table-striped table-hover">
		<thead>
			<tr><h4 align="center">Turno Mañana</h4></tr>
			<tr><th>Grupo</th>
			<th>Titulo</th>
			<th>Descripcion</th>
			<th>Inicio</th>
			<th>Término</th>
			<th>Status</th></tr>
		</thead>
		<tbody>
			<?php 
				while($lista1 = mysql_fetch_array($dia)){
					echo "<tr><td width='12%'>".$lista1['tipo']."</td>";
					echo "<td width='20%'>".$lista1['titulo']."</td>";
					echo "<td>".$lista1['descripcion']."</td>";
					echo "<td width='7%'>".$lista1['inicio']."</td>";
					echo "<td width='7%'>".$lista1['fin']."</td>";
					echo "<td width='8%'>".$lista1['estatus']."</td></tr>";
				}
			?>
		</tbody>
		
</table>
<table class="table table-striped table-hover">
		<tr><h4 align="center">Turno Tarde</h4></tr>
		<thead>
			<th>Grupo</th>
			<th>Titulo</th>
			<th>Descripcion</th>
			<th>Inicio</th>
			<th>Término</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php 
				while($lista1 = mysql_fetch_array($tarde)){
					echo "<tr><td width='12%'>".$lista1['tipo']."</td>";
					echo "<td width='20%'>".$lista1['titulo']."</td>";
					echo "<td>".$lista1['descripcion']."</td>";
					echo "<td width='7%'>".$lista1['inicio']."</td>";
					echo "<td width='7%'>".$lista1['fin']."</td>";
					echo "<td width='8%'>".$lista1['estatus']."</td></tr>";
				}
			?>
		</tbody>
		
</table>
<table class="table table-striped table-hover">
		<tr><h4 align="center">Turno Noche</h4></tr>
		<thead>
			<th>Grupo</th>
			<th>Titulo</th>
			<th>Descripcion</th>
			<th>Inicio</th>
			<th>Término</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php 
				while($lista1 = mysql_fetch_array($noche)){
					echo "<tr><td width='12%'>".$lista1['tipo']."</td>";
					echo "<td width='20%'>".$lista1['titulo']."</td>";
					echo "<td>".$lista1['descripcion']."</td>";
					echo "<td width='7%'>".$lista1['inicio']."</td>";
					echo "<td width='7%'>".$lista1['fin']."</td>";
					echo "<td width='8%'>".$lista1['estatus']."</td></tr>";
				}
			?>
		</tbody>
		
</table>

</div>
<form action="functions/excel.php" method="post" target="_blank" id="FormularioExportacion">
<button class="btn btn-success botonExcel" />Exportar a Excel</button>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>

<script language="javascript">
$(document).ready(function() {
$(".botonExcel").click(function(event) {
$("#datos_a_enviar").val( $("<div>").append( $("#exportar").eq(0).clone()).html());
$("#FormularioExportacion").submit();
});
});
</script>