<?php require_once ('functions/funciones.php');?>
<form class="form-horizontal" name="insertar" method="post" action="functions/f-insertar.php">
<div class="col-lg-4">
	<div class="bs-component">
	<fieldset>
		<legend>Ingresar Entrada</legend>
			<div class="form-group">
				<label for="inputTitulo" class="col-lg-2 control-label" id="titulo">Titulo</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="titulo" placeholder="Ingrese Titulo">
				</div>
			</div>
			<div class="form-group">
				<label for="select" class="col-lg-2 control-label">Proceso</label>
				<div class="col-lg-10">
					<select name="proceso">
						<option value="null"> -Elija Proceso- </option>
						<?php
							$procesos = listadoProcesos();
							while ($list = mysql_fetch_array($procesos)){
								echo '<option value = "'.$list['id'].'">'.$list['descripcion'].'</option>';
							} ?>
					</select>
					
				</div>
			</div>
			<div class="form-group">
				<label for="textArea" class="col-lg-2 control-label">Inserte Entrada</label>
				<div class="col-lg-10">
					<textarea class="form-control" name='desc' rows='4' placeholder="Inserte Entrada"></textarea>
				</div>
			</div>			
		
			<div class="form-group">
				<label for="inputTitulo" class="col-lg-0 control-label">Inicio</label>
    			<input id="inicio" name="inicio" type="time" size="5" maxlength="5" data-default="EE:EE">
				<label for="inputTitulo" class="col-lg- control-label">Fin</label>
    			<input id="fin" name="fin" type="time" size="5" maxlength="5"data-default="EE:EE">
			</div>
		
			<script>
				var input = $('#inicio');
					input.clockpicker({
						placement: 'top',
   						autoclose: true
					});
			</script>
			<script>
				var input = $('#fin');
					input.clockpicker({
						placement: 'top',
   						autoclose: true
					});
			</script>
			<input type="hidden" name="usuario" value="<?php $usuario;?>">
			<input type="hidden" name="turno" value="<?php $tu;?>">
		
			<div class="btn-group">
				<input class="btn btn-primary" type="submit" name="acept" value=" Aceptar ">
				<input class="btn btn-default" type="reset" name="clear" value=" Limpiar ">
			</div>
		</fieldset>
	</div>
</div>
</form>

