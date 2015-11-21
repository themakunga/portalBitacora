<?php
$tipos = list_tipo_notas();
$estatus = list_estatus_notas();
$NETipos = list_tipo_notas();
$NEEstatus = list_estatus_notas();
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
								<td class="col-xs-1"><a href="#modal-edit"  data-toggle="modal"
                                                                data-id="'.$lista['id'].'"
                                                                data-descripcion="'.$lista['descripcion'].'"
                                                                data-estatus="'.$lista['estado'].'"
                                                                data-importancia="'.$lista['importancia'].'">Editar</a></td>
							</tr>';

			}else{
				if($lista['importancia'] == 2){
					echo 	'<h4><tr class="danger">
							<td class="col-xs-1">'.convertir_fecha($lista['fecha_crea'],1).'</td>
							<td class="col-xs-1">'.iconosNotas($lista['id']).'</td>
							<td class="col-xs-8">'.$lista['descripcion'].'</td>
							<td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
              <td class="col-xs-1"><a href="#modal-edit"  data-toggle="modal"
                                                              data-id="'.$lista['id'].'"
                                                              data-descripcion="'.$lista['descripcion'].'"
                                                              data-estatus="'.$lista['estado'].'"
                                                              data-importancia="'.$lista['importancia'].'">Editar</a></td>
            </tr>';
				}else{
					if($lista['importancia'] == 4){
						echo '<tr class="active">
							<td class="col-xs-1">'.convertir_fecha($lista['fecha_crea'],1).'</td>
							<td class="col-xs-1">'.iconosNotas($lista['id']).'</td>
							<td class="col-xs-8"><i>'.$lista['descripcion'].'</i></td>
							<td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
              <td class="col-xs-1"><a href="#modal-edit"  data-toggle="modal"
                                                              data-id="'.$lista['id'].'"
                                                              data-descripcion="'.$lista['descripcion'].'"
                                                              data-estatus="'.$lista['estado'].'"
                                                              data-importancia="'.$lista['importancia'].'">Editar</a></td>
            </tr>';
						}else{
							echo '<tr class="info"><td class="col-xs-1">'.convertir_fecha($lista['fecha_crea'],1).'</td>
							<td class="col-xs-1">'.iconosNotas($lista['id']).'</td>
							<td class="col-xs-8"><i>'.$lista['descripcion'].'</i></td>
							<td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td>
              <td class="col-xs-1"><a href="#modal-edit" data-toggle="modal"
                                                              data-id="'.$lista['id'].'"
                                                              data-descripcion="'.$lista['descripcion'].'"
                                                              data-estatus="'.$lista['estado'].'"
                                                              data-importancia="'.$lista['importancia'].'">Editar</a></td>
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
			<input class="btn btn-primary" type="button" name="historial" value="Historial Entradas" data-toggle="modal" data-target="#HistorialNotas"/>
		</div>
	</div>

</form>

<form name="new_nota" method="POST" action="./functions/notanueva.php" role="form" data-toggle="validator">
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
        <textarea type="text" class="form-control" id="notas" name="notas" placeholder="" required></textarea>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input class="btn btn-success" type="submit" name="insertar" value="Ingresar Nota"/>
      </div>
    </div>
  </div>
</div>
</form>

<form class="" action="./functions/f-notice.php" method="post" role="form" data-toggle="validator">
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Editar Nota</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="hidden" name="NotaEdID" value=""/>
        <div class="form-group">
            <textarea rows="3" class="form-control" name="NotaEdDescripcion" value="" required></textarea>
        </div>
        <label>Tipo</label>
      	<select name="NotaEdImportancia" class="form-control">
      		<?php
      			while($impor2=mysql_fetch_array($NETipos)){
      				echo '<option value="'.$impor2['id'].'">'.$impor2['valor'].'</option>';
      			}
      		?>
      	</select>
      	<label>Estatus</label>
      	<select class="form-control" name="NotaEdEstatus">
      		<?php
      			while($nivel2=mysql_fetch_array($NEEstatus)){
      				echo '<option value="'.$nivel2['id'].'">'.$nivel2['valor'].'</option>';
      			}
      		?>
      	</select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input class="btn btn-danger" type="submit" name="del" value="Eliminar Nota"/>
        <input class="btn btn-success" type="submit" name="edit" value="Editar Nota"/>
      </div>
    </div>
  </div>
</div>
</form>

<form class="" action="./functions/f-revalidaNota.php" method="post">
  <div class="modal fade modal-wide" id="HistorialNotas" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h2 class="modal-title" id="">Historial de Notas<small> Ultimas 10</small></h2>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th class="col-xs-1">ID</th>
                <th class="col-xs-1">Creacion</th>
                <th class="col-xs-5">Descripcion</th>
                <th class="col-xs-1">Usuario</th>
                <th class="col-xs-1">Estatus</th>
                <th class="col-xs-1">Nivel</th>
                <th class="col-xs-2">Ultima Modificacion</th>
                <th class="col-xs-1"></th>
              </tr>
            </thead>
            <tbody>
        <?php
            $res = ultimasNotas();
            while($lista=mysql_fetch_array($res)){
              echo '<tr>
              <td class="col-xs-1">'.$lista['id'].'</td>
              <td class="col-xs-1">'.convertir_fecha($lista['fecha'],1).'</td>
              <td class="col-xs-5">'.$lista['descripcion'].'</td>
              <td class="col-xs-1">'.$lista['usuario'].'</td>
              <td class="col-xs-1">'.$lista['estado'].'</td>
              <td class="col-xs-1">'.$lista['importancia'].'</td>
              <td class="col-xs-2">'.fecha_visible($lista['modificacion'],1).'</td>
              <td class="col-xs-1"><input type="checkbox" name="nota[]" value="'.$lista['id'].'"></td></tr>';

            }


        ?>
          </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <input class="btn btn-success" type="submit" name="actualiza" value="Revalidar Notas"/>
        </div>
      </div>
    </div>
  </div>
</form>


<script type="text/javascript">
  $('#modal-edit').on('show.bs.modal', function(e) {
    var editDescripcion = $(e.relatedTarget).data('descripcion');
    var editID = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('textarea[name="NotaEdDescripcion"]').val(editDescripcion);
    $(e.currentTarget).find('input[name="NotaEdID"]').val(editID);
  });
</script>
<script type="text/javascript">
  $(".modal-wide").on("show.bs.modal", function() {
      var height = $(window).height() - 200;
      $(this).find(".modal-body").css("max-height", height);
    });
</script>
