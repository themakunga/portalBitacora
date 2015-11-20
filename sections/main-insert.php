<?php

?>
<div class="col-lg-12">
		<div class="page-header">
			<h2>Ingreso en Bitacora</h2>
		</div>
</div>
<a href="#ModalInsert" data-toggle="modal" data-target="#ModalInsert" class="btn-primary btn-lg">Insertar Entrada</a>

<form class="" action="functions/ingresa.php" method="post">
<div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Ingresar Nueva Entrada</h4>
      </div>
      <div class="modal-body">
				<div class="form-group">
						<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese Titulo">
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
						<textarea class="form-control" name='desc' id="desc" rows='4' placeholder="Inserte Entrada"></textarea>
				</div>
				<div class="form-group">


				<div class="form-group">
				<label for="inicio" class="col-xs-2 control-label">Inicio</label>
				<div class="input-group clockpickerIncio col-xs-3">
				<input type="text" class="form-control" name="inicio" value="00:00">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
					</span>
				</div>
				<script type="text/javascript">
					$('.clockpickerIncio').clockpicker({
						 donetext: 'Done'
					});
				</script>
			</div>

			<div class="form-group">
				<label for="fin" class="col-xs-2 control-label">Fin</label>
				<div class="input-group clockpickerFin col-xs-3">
					<input type="text" class="form-control" name="fin" value="01:00">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
					</span>
				</div>
				<script type="text/javascript">
					$('.clockpickerFin').clockpicker({
						 donetext: 'Done'
					});
				</script>
				</div>

		</div>
				<input type="hidden" name="usuario" value="<?php $usuario;?>">
				<input type="hidden" name="turno" value="<?php $tu;?>">
      </div>
      <div class="modal-footer">
				<div class="btn-group">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
					<input class="btn btn-primary" type="submit" name="ingresar" value=" Insertar ">
					<input class="btn btn-info" type="submit" name="pendiente" value=" Dejar Pendiente ">
					<input class="btn btn-default" type="reset" name="clear" value=" Limpiar ">
				</div>
			</div>
    </div>
  </div>
</div>
</form>
