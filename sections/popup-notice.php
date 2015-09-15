<?php
require_once ('../functions/funciones.php');
$key = $_GET['edit'];
echo $key;
$newkey = obtener_notas($key);
$tipos = list_tipo_notas();
$estados = list_estatus_notas();

?>
<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"  media="screen,projection"/></link>
	<form name = "popup-notice" method="post" action="../functions/f-notice.php">
		<?php while($list = mysql_fetch_array($newkey)){?>
			<table>
				<tr>
					<td><label>Nota</label></td><td><textarea name="texto" cols="40" rows="3"><?php echo $list['descripcion'];?></textarea></td>
				</tr>
				<tr>
					<td><label>Tipo de Nota</label></td><td><select id="importancia">
						<?php while($impor=mysql_fetch_array($tipos)){
							if($list['importancia'] == $impor['id']){
								echo '<option value="'.$impor['id'].'" selected>'.$impor['valor'].'</option>';
							}else{
								echo '<option value="'.$impor['id'].'">'.$impor['valor'].'</option>';
							}
							
						} ?>
					</select></td></tr>
					<tr><td><label>Estatus Nota:</label></td><td><select id="estatus">
						<?php while($esta=mysql_fetch_array($estados)){
								if($list['estatus'] == $esta['id']){
									echo '<option value"'.$esta['id'].'" selected>'.$esta['valor'].'</option>';
								}else{
									echo '<option value"'.$esta['id'].'">'.$esta['valor'].'</option>';
								}
							}
						
						?>
					</select></td></tr>
				</tr>
			</table>
			<span class="botonera">
				<input class="boton_pri" type="submit" name="edit" value="Guardar Cambios"/>
				<input class="boton_pri" type="submit" name="del" value="Eliminar Entrada"/>
				<input class="boton_pri" type="submit" name="cerrar" value="Cerrar" onclick="javascript:window.close()"/>
			</div>
			
		<?php } ?>
	</form>
	
