<?php
require_once ('../functions/funciones.php');
$key = $_GET['edit'];
//echo $key;
$newkey = obtener_notas($key);
$tipos = list_tipo_notas();
$estados = list_estatus_notas();

?>
<script>
	function refreshParent() 
	{
    	window.opener.location.reload(true);
	}
</script>
<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"  media="screen,projection"/></link>
<body class"col-lg-6" onunload="javascript:refreshParent()">
	<form name="popup-notice" method="post" action="../functions/f-notice.php">
		<?php while($list = mysql_fetch_array($newkey)){?>
			<h3>Editar Nota <small>ID <?php echo $key;?></small></h3>
			<div class="well bs-component">
				<textarea name="texto" class="form-control" rows="3"><?php echo $list['descripcion'];?></textarea>
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
						while($nivel=mysql_fetch_array($estados)){
							echo '<option value="'.$nivel['id'].'">'.$nivel['valor'].'</option>';
						} 
					?>	
				</select>
				<input class="hidden" name="id" value="<?php echo $key;?>"></input>
				<br>
				<span class="botonera">
					<input class="btn btn-success" type="submit" name="edit" value="Guardar Cambios" />
					<input class="btn btn-danger" type="submit" name="del" value="Eliminar Entrada"/>
					<input class="btn btn-default" type="submit" name="cerrar" value="Cerrar" onclick="javascript:window.close()"/>
				</span>
			
		<?php } ?>
		</div>	
	</form>
	

</body>
