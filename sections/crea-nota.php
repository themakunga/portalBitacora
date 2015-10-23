<link type="text/css" rel="stylesheet" href="../css/bootstrap.css" media="screen"></link>
<?php
	require_once('../functions/funciones.php');
	$tipos = list_tipo_notas();
	$estatus = list_estatus_notas();
?>
<script>
	function refreshParent() 
	{
    	window.opener.location.reload(true);
	}
</script>

<body onunload="javascript:refreshParent()">
<div class="well bs-component col-lg-6">
	<h2>Ingrese Nueva Nota</h2>
<form name="new_nota" method="POST" action="../functions/notanueva.php">
	<div class="inserta_pop">
	<textarea name='notas' class="form-control" rows='2' cols='50'></textarea>
	<br>
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
	<p></p>
	<span class="botonera">
		<input class="btn btn-success" type="submit" name="insertar" value="Ingresar Nota"/>
		<input class="btn btn-default" type="button" name="cerrar" value="Cerrar" onclick="javascript:window.close()"/>
	</span>
	
</form>
</div>
</body>