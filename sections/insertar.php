<?php require_once ('functions/funciones.php');?>
<form id="inserta-entrada" class="form-horizontal" name="insertar" method="post" action="functions/f-insertar.php">
<div class="col-lg-12 well bs-component">
	<div class="bs-component text-center">	<fieldset>
		<legend>Ingresar Entrada</legend>
			<div class="form-group">
				<div class="col-lg-12">
					<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese Titulo">
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-12">
					<select name="proceso" class="form-control">
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
				<div class="col-lg-12">
					<textarea class="form-control" name='desc' id="desc" rows='4' placeholder="Inserte Entrada"></textarea>
				</div>
			</div>			
		
			<div class="form-group">
				<label for="inputTitulo" class="col-lg-2 control-label">Inicio</label>
    			<div class="col-xs-4">
    				<input id="inicio" name="inicio" class="form-control" type="time" size="5" maxlength="5" data-default="EE:EE">
    			</div>
    		
				<label for="inputTitulo" class="col-lg-2 control-label">Fin</label>
				<div class="col-xs-4">
    				<input class="form-control" id="fin" name="fin" type="time" size="5" maxlength="5"data-default="EE:EE">
				</div>
			</div>
		
			
			<input type="hidden" name="usuario" value="<?php $usuario;?>">
			<input type="hidden" name="turno" value="<?php $tu;?>">
		
			<div class="btn-group">
				<input class="btn btn-primary" type="submit" name="acept" value=" Insertar ">
				<input class="btn btn-info" type="submit" name="pend" value=" Dejar Pendiente ">
				<input class="btn btn-default" type="reset" name="clear" value=" Limpiar ">
			</div>
		</fieldset>
	</div>
</div>
</form>

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
<script type="text/javascript">
	$(document).ready(function(){
		$('#inserta-entrada').validate{
			rules: {
				titulo:{
					required: true,
			       required: true

				}
				desc: {
					required: true,
			       required: true
				}
			},
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
		 
		});
		
	});
</script>