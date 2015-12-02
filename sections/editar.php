<?php
require_once ('functions/funciones.php');
 $bitacoras = listaBitacoras();
?>

<h4>

	<div class="form-group col-lg-12">
	  <label for="bitacoras" class="col-xs-2">Elija Una </label>
<div class="col-xs-3">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-list"></i></span>
<select id='bitacoras' class="form-control">
	<option value="">Bitacora</option>
	<?php while($ls = mysql_fetch_array($bitacoras)){
		echo "<option value='".$ls['id']."'>".convertir_fecha($ls['apertura'],'1')."</option>";
	};?>
</select>
</div>
</div>
	</div>
</h4>
<br><br>
<div id = 'tableContainer'></div>





<script type="text/javascript">
$(function() {
	$("#bitacoras").bind("change", function() {
			$.ajax({
					type: "GET",
					url: "./functions/get-bitacora.php",
					data: "bitacora="+$("#bitacoras").val(),
					success: function(html) {
							$("#tableContainer").html(html);
					}
			});
	});

});
</script>
