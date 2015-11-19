<?php
$tipos = list_tipo_notas();
$estatus = list_estatus_notas();

 ?>

<div class="page-header">
	<h2>Avisos y Notas Importantes</h2>
</div>

<form name = "notas-v" method="POST" action="functions/f-notas.php">

	<table class="table table-striped table-hover">

		<thead>
			<tr>
				<th class="col-xs-1"> Fecha </th>
				<th class="col-xs-1"> Estatus </th>
				<th class="col-xs-8"> Contenido Nota </th>
				<th class="col-xs-1"> Ticket</th>
				<th class="col-xs-1"> </th>
			</tr>
		</thead>

		<tbody>
<?php
		$res = listadoNotas();
		while($lista = mysql_fetch_array($res)){
			if($lista['importancia'] == 1){
				echo 	'<tr class="warning">
								<td class="col-xs-1">'.convertir_fecha($lista['fecha_crea'],1).'</td>
								<td class="col-xs-1">'.iconosNotas($lista['id']).'</td>
								<td class="col-xs-8">'.$lista['descripcion'].'</td>
								<td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
								<td class="col-xs-1"><a href="#" id="reg_link" data-toggle="modal" data-book-id="'.$lista[descripcion].'">Editar</a></td>
							</tr>';

			}else{
				if($lista['importancia'] == 2){
					echo 	'<h4><tr class="danger">
							<td class="col-xs-1">'.convertir_fecha($lista['fecha_crea'],1).'</td>
							<td class="col-xs-1">'.iconosNotas($lista['id']).'</td>
							<td class="col-xs-8">'.$lista['descripcion'].'</td>
							<td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<td class="col-xs-1"><a href="#" id="reg_link" data-toggle="modal" data-book-id="'.$lista[descripcion].'">Editar</a></td>
            </tr>';
				}else{
					if($lista['importancia'] == 4){
						echo '<tr class="active">
							<td class="col-xs-1">'.convertir_fecha($lista['fecha_crea'],1).'</td>
							<td class="col-xs-1">'.iconosNotas($lista['id']).'</td>
							<td class="col-xs-8"><i>'.$lista['descripcion'].'</i></td>
							<td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
              <td class="col-xs-1"><a href="#" id="reg_link" data-toggle="modal" data-book-id="'.$lista[descripcion].'">Editar</a></td>
            </tr>';
						}else{
							echo '<tr class="info"><td class="col-xs-1">'.convertir_fecha($lista['fecha_crea'],1).'</td>
							<td class="col-xs-1">'.iconosNotas($lista['id']).'</td>
							<td class="col-xs-8"><i>'.$lista['descripcion'].'</i></td>
							<td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
							<td class="col-xs-1"><a href="#" id="reg_link" data-toggle="modal" data-book-id="'.$lista[descripcion].'">Editar</a></td>
						</tr>';

						}
				}
			}
		}
?>		</tbody>
	</table>
	<div class="panel panel-default">
		<div class="panel-body pull-right">
			<input class="btn btn-success" type="button" name="crea" value="Crear Nota" data-toggle="modal" data-target="#crea-nota"/>
			<input class="btn btn-danger" type="submit" name="elimina" value="Eliminar Marcadas"/>
			<input class="btn btn-primary" type="button" name="historial" value="Historial Entradas" onclick="javascript:newPopup_hist('sections/notas.php');" />
		</div>
	</div>

</form>

<form name="new_nota" method="POST" action="./functions/notanueva.php">
<div class="modal fade" id="crea-nota" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Ingrese Nueva Nota</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <label for="Tipo"></label>
        <textarea type="text" class="form-control" id="notas" name="notas" placeholder=""></textarea>
      </div>
      <label>Tipo</label>
    	<select name="n_tipos" class="form-control">
    		<?php
    			while($impor=mysql_fetch_array($tipos)){
    				echo '<option value="'.$impor['id'].'">'.$impor['valor'].'</option>';
    			}
    		?>
    	</select>
    	<label>Estatus</label>
    	<select class="form-control" name="n_nivel">
    		<?php
    			while($nivel=mysql_fetch_array($estatus)){
    				echo '<option value="'.$nivel['id'].'">'.$nivel['valor'].'</option>';
    			}
    		?>
    	</select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input class="btn btn-success" type="submit" name="insertar" value="Ingresar Nota"/>
      </div>
    </div>
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
