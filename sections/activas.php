<?php
$ultimas = entradasEjecucion();

?>
<div class="well col-lg-12">
<h3>Entradas Activas</h3>
<table class="table table-fixed">
	<thead>
		<tr>
			<th class="col-xs-1">ID</th>
			<th class="col-xs-7">Descripcion</th>
			<th class="col-xs-1">Desde</th>
			<th class="col-xs-2">Estatus</th>
			<th class="col-xs-1"></th>
		</tr>
	</thead>
	<tbody>
		<?php
			while($lista = mysql_fetch_array($ultimas)){
				echo '<tr>
						<td class="col-xs-1">'.$lista['id'].'</td>
						<td class="col-xs-7">'.utf8_decode($lista['descripcion']).'</td>
						<td class="col-xs-1">'.$lista['inicio'].'</td>
						<td class="col-xs-2">'.iconoPend($lista['id']).'</td>
						<td class="col-xs-1"><a href="#editEntrada" data-toggle="modal" data-id="'.$lista['id'].'"
						 																																data-titulo="'.utf8_decode($lista['titulo']).'"
																																						data-descripcion="'.utf8_decode($lista['descripcion']).'"
																																						data-horainicio="'.$lista['inicio'].'"
																																						data-horafin="'.$lista['fin'].'"
																																						class="btn btn-xs btn-success">Validar</a></td>
					</tr>';
			}
		?>
	</tbody>
</table>
</div>


<form class="" action="./functions/finalizaentrada.php" method="post" role="form" data-toggle="validator">

<div class="modal fade" id="editEntrada" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Finalizar Entrada Vigente</h4>
      </div>
      <div class="modal-body">
				<input type="hidden" name="EntEdID" value=""/>
				<div class="form-group">
				  <label for="titulo"></label>
				  <input type="text" class="form-control" id="EntEdTitulo" name="EntEdTitulo" value="" required/>
				</div>

				  <label for="descripcion"></label>
				  <textarea class="form-control" id="EntEdDescripcion" name="EntEdDescripcion" value="" required></textarea>

				<div class="form-group col-xs-6">
				<div class="form-group">
					<label for="inicio" class="control-label">Inicio</label>
					<div class="input-group clockpickerInicio">
						<input name="EntEdInicio" id="EntEdInicio" type="text" class="form-control" value="" required/>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
						</span>
					</div>
					<script type="text/javascript">
						$('.clockpickerInicio').clockpicker({
							autoclose: true,
							placement: 'top'
						});
					</script>
				</div>
				</div>
			<div class="form-group col-xs-6">
				<label for="fin" class="control-label">Fin</label>
				<div class="input-group clockpickerFin">
					<input name="EntEdFin" id="EntEdFin" type="text" class="form-control" value="" required/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
					</span>
				</div>
				<script type="text/javascript">
					$('.clockpickerFin').clockpicker({
						autoclose: true,
						placement: 'top',
						'default': 'now'
					});
				</script>
			</div>

      </div>
      <div class="modal-footer btn-group">
				<input class="btn btn-success" type="submit" name="finalizar" value="Finalizar Entrada">
				<input class="btn btn-danger" type="submit" name="eliminar" value="Eliminar Entrada">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
	$('#editEntrada').on("shown.bs.modal", function(e){
		var EdEntID = $(e.relatedTarget).data('id');
		var EdEntTitulo = $(e.relatedTarget).data('titulo');
		var EdEntDescripcion = $(e.relatedTarget).data('descripcion');
		var EdEntInicio = $(e.relatedTarget).data('horainicio');
		var EdEntFin = $(e.relatedTarget).data('horafin');
		$(e.currentTarget).find('input[name="EntEdID"]').val(EdEntID);
		$(e.currentTarget).find('input[name="EntEdTitulo"]').val(EdEntTitulo);
		$(e.currentTarget).find('textarea[name="EntEdDescripcion"]').val(EdEntDescripcion);
		$(e.currentTarget).find('input[name="EntEdInicio"]').val(EdEntInicio);
		$(e.currentTarget).find('input[name="EntEdFin"]').val(EdEntFin);
	});
</script>
