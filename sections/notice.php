<h3>Avisos y Notas Importantes</h3>


<form name = "notas-v" method="POST" action="functions/f-notas.php">
	
	<table class="table table-striped table-hover">

		<thead>
			<tr>
				<td class="col-xs-2"> Fecha </td>
				<td class="col-xs-9"> Contenido Nota </td>
				<td class="col-xs-1"> Ticket</td>
			</tr>
		</thead>

		<tbody>
<?php
		$res = listadoNotas();		
		while($lista = mysql_fetch_array($res)){
			$array = $lista['id'];
			if($lista['importancia'] == 1){
				echo 	'<tr class="warning"><td class="col-xs-2">
							<a href=javascript:newPopup("sections/popup-notice.php?edit='.$array.'");>'.convertir_fecha($lista['fecha_crea'],1).'</a>
						</td>
						<td class="col-xs-9">'.$lista['descripcion'].'</td>
						<td class="col-xs-1"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<input type ="text" name="id[]" value="'.$lista['id'].'" style="visibility: hidden"></tr>';
			}else{
				if($lista['importancia'] == 2){
					echo 	'<h4><tr class="danger"><td class="col-xs-2">
								<a href=javascript:newPopup("sections/popup-notice.php?edit='.$array.'");>'.convertir_fecha($lista['fecha_crea'],1).'</a>
							</td>
							<td class="col-xs-9">'.$lista['descripcion'].'</td>
							<td class="col-xs-1"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<input type ="text" name="id[]" value="'.$lista['id'].'" style="visibility: hidden"></tr>';
				}else{
					if($lista['importancia'] == 4){
						echo '<tr class="active"><td class="col-xs-2">
								<a href=javascript:newPopup("sections/popup-notice.php?edit='.$array.'");>'.convertir_fecha($lista['fecha_crea'],1).'</a>
							</td>
							<td class="col-xs-9"><i>'.$lista['descripcion'].'</i></td>
							<td class="col-xs-1"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<input type ="text" name="id[]" value="'.$lista['id'].'" style="visibility: hidden"></tr>';
						}else{
							echo '<tr class="info"><td class="col-xs-2">
								<a href=javascript:newPopup("sections/popup-notice.php?edit='.$array.'");>'.convertir_fecha($lista['fecha_crea'],1).'</a>
							</td>
							<td class="col-xs-9"><i>'.$lista['descripcion'].'</i></td>
							<td class="col-xs-1"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<input type ="text" name="id[]" value="'.$lista['id'].'" style="visibility: hidden"></tr>';

						}
				}
			}
		}			
?>		</tbody>
	</table>
	<div class="panel panel-default">
		<div class="panel-body pull-right">
			<input class="btn btn-success" type="button" name="crea" value="Crear Nota" onclick="javascript:newNota('sections/crea-nota.php');"/>
			<input class="btn btn-danger" type="submit" name="elimina" value="Eliminar Marcadas"/>
			<input class="btn btn-primary" type="button" name="historial" value="Historial Entradas" onclick="javascript:newPopup_hist('sections/notas.php');" />
		</div>
	</div>
	
</form>

<script>
	function newNota(sitio){
		var opciones = "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=550, height=410, top=85, left=140";
		window.open(sitio,"",opciones);
	}
</script>

<script>
	function newPopup_hist(sitio){
		var opciones = "toolbar=no, location=no, directories=no, status=no, menubar=no, resizable=yes, width=1300, height=600, top=85, left=140";
		window.open(sitio,"",opciones);
	}
</script>

<script>
	function newPopup(sitio){
		var opciones = "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=550, height=450, top=85, left=140";
		window.open(sitio,"",opciones);
	}
</script>