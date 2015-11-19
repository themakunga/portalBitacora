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
<body onunload="javascript:refreshParent()">


<form class="form-horizontal form" action="../functions/f-notice.php" method="post">
	<?php while($list = mysql_fetch_array($newkey)){?>
	<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="">Editar Nota <small>ID <?php echo $key;?></small></h4>
	      </div>
	      <div class="modal-body">
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
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input class="btn btn-success" type="submit" name="edit" value="Guardar Cambios" />
					<input class="btn btn-danger" type="submit" name="del" value="Eliminar Entrada"/>
	      </div>
	    </div>
	  </div>
	</div>
</form>
<?php } ?>
</body>
