<?php

$listado = listaChklst();
$dia = '1';


?>
<?php require_once ('functions/funciones.php');?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<td>Nombre</td>
			<td>Horario Sugerido</td>
			<td>Horario Realizado</td>
			<td>Checklist</td>
		</tr>
	</thead>
	<tbody>
		<?php 
			while($list = mysql_fetch_array($listado)){
					
					
				echo utf8_encode('<tr class="default">
						<td ><a href="#" data-container="body" data-toggle="popover"  data-trigger="hover" data-placement="top" data-content="'.$list['descripcion'].'" data-original-title="" title="">'.$list['nombre'].'</a></td>
						<td>'.$list['horario'].'</td>
						<td><label for="inputTitulo" class="col-lg-0 control-label">Inicio</label>
    			<input id="inicio" name="inicio" type="time" size="5" maxlength="5" data-default="EE:EE"></td>
						<td width="10%"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
					</tr>');
			
			}
		?>
	</tbody>
</table>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>
<script>
	var input = $('#inicio');
	input.clockpicker({
		placement: 'top',
		autoclose: true
	});
</script>
