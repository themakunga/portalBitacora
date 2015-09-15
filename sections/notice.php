<h3>Avisos y Notas Importantes</h3>


<form name = "notas-v" method="POST" action="functions/f-notas.php">
	
	<table class="table table-striped table-hover">
		<tbody>
<?php
		$res = listadoNotas();		
		while($lista = mysql_fetch_array($res)){
			$array = $lista['id'];
			if($lista['importancia'] == 1){
				echo 	'<tr class="warning"><td width="25%">
							<a href=javascript:newPopup("sections/popup-notice.php?edit='.$array.'");>'.convertir_fecha($lista['fecha_crea'],1).'</a>
						</td>
						<td>'.$lista['descripcion'].'</td>
						<td width="10%"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<input type ="text" name="id[]" value="'.$lista['id'].'" style="visibility: hidden"></tr>';
			}else{
				if($lista['importancia'] == 2){
					echo 	'<h4><tr class="danger"><td width="25%">
								<a href=javascript:newPopup("sections/popup-notice.php?edit='.$array.'");>'.convertir_fecha($lista['fecha_crea'],1).'</a>
							</td>
							<td>'.$lista['descripcion'].'</td>
							<td width="10%"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<input type ="text" name="id[]" value="'.$lista['id'].'" style="visibility: hidden"></tr>';
				}else{
						echo '<tr class="active"><td width="25%">
								<a href=javascript:newPopup("sections/popup-notice.php?edit='.$array.'");>'.convertir_fecha($lista['fecha_crea'],1).'</a>
							</td>
							<td><i>'.$lista['descripcion'].'</i></td>
							<td width="10%"> <input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<input type ="text" name="id[]" value="'.$lista['id'].'" style="visibility: hidden"></tr>';
				}
			}
		}			
?>		</tbody>
	</table>
	<div class="panel panel-default">
		<div class="panel-body">
			<input class="btn btn-success" type="submit" name="crea" value="Crear Nota" onclick="javascript:newPopup('sections/crea-nota.php');"/>
			<input class="btn btn-danger" type="submit" name="elimina" value="Eliminar Marcadas"/>
			<input class="btn btn-primary" type="button" name="historial" value="Historial Entradas" onclick="javascript:newPopup_big('sections/notas.php');" />
		</div>
	</div>
	
</form>

