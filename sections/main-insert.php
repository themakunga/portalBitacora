<?php

?>
<div class="col-lg-12">
		<div class="page-header">
			<h2>Ingreso en Bitacora</h2>
		</div>
</div>
<a href="#ModalInsert" data-toggle="modal" data-target="#ModalInsert" class="btn-primary btn-lg">Insertar Entrada</a>
<br>
<br>

<form class="" action="functions/ingresa.php" method="post" role="form" data-toggle="validator">
<div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Ingresar Nueva Entrada</h4>
      </div>
      <div class="modal-body">
				<div class="form-group">
						<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese Titulo" required>
				</div>
				<div class="form-group">
						<select name="proceso" class="form-control">
							<option value="null"> -Elija Proceso- </option>
							<?php
								$procesos = listadoProcesos();
								while ($list = mysql_fetch_array($procesos)){
									echo '<option value = "'.$list['id'].'">'.$list['descripcion'].'</option>';
								} ?>
						</select>

				</div>
				<div class="form-group">
						<textarea class="form-control" name='desc' id="desc" rows='3' placeholder="Inserte Entrada" required></textarea>
				</div>



					<div class="form-group col-xs-6">
						<label for="inicio" class="control-label">Inicio</label>
						<div id="clockpickerInicio" class="input-group">
							<input name="inicio" id="inicio" type="text" class="form-control" value=""/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>
						<script type="text/javascript">
							var input = $('#clockpickerInicio');
							input.clockpicker({
								placement: 'top',
   							autoclose: true
							});
						</script>
					</div>

				<div class="form-group col-xs-6">
					<label for="fin" class="control-label">Fin</label>
					<div class="input-group clockpickerFin">
						<input name="fin" id="fin" type="text" class="form-control" value=""/>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
						</span>
					</div>
					<script type="text/javascript">
						$('.clockpickerFin').clockpicker({
						 	autoclose: true,
							placement: 'top'
						});
					</script>
				</div>


				<input type="hidden" name="usuario" value="<?php $usuario;?>">
				<input type="hidden" name="turno" value="<?php $tu;?>">
      </div>
      <div class="modal-footer">
				<div class="btn-group">
					<input class="btn btn-primary" type="submit" name="ingresar" value=" Insertar ">
					<input class="btn btn-info" type="submit" name="pendiente" value=" Dejar Pendiente ">
					<input class="btn btn-default" type="reset" name="clear" value=" Limpiar ">
					<button class="btn btn-warning" type="button"  data-dismiss="modal">Cerrar</button>
				</div>
			</div>
    </div>
  </div>
</div>
</form>
