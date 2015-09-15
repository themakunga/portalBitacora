<link type="text/css" rel="stylesheet" href="../scripts/style/style.css" media="screen"></link>
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

<from method="POST" action="functions/f-notas.php">
	<div class="inserta_pop">
	<textarea name='nota' rows='2' cols='50'></textarea>
	<br>
	<label>Tipo</label>
	<select id="n_tipos">
		<?php 
			while($impor=mysql_fetch_array($tipos)){
				echo '<option value="'.$impor['id'].'">'.$impor['valor'].'</option>';
			} 
		?>	
	</select>
	<label>Estatus</label>
	<select id="n_nivel">
		<?php 
			while($nivel=mysql_fetch_array($estatus)){
				echo '<option value="'.$nivel['id'].'">'.$nivel['valor'].'</option>';
			} 
		?>	
	</select>
	</div>
	<span class="botonera">
		<input class="boton_pri" type="submit" name="inserta" value="Ingresar Nota"/>
		<input class="boton_pri" type="submit" name="cerrar" value="Cerrar" onclick="javascript:window.close()"/>
	</span>
	
</from>
</body>