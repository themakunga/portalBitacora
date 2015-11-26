<?php
require_once ('functions/funciones.php');

$fecha = date("Y-m-d H:i:s");
echo $fecha;
$dia = entradaTurno("1");
$tarde = entradaTurno("2");
$noche = entradaTurno("3");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="exportar">
	<colgroup>
            <col width="20%">
                <col width="20%">
                    <col width="20%">
                        <col width="20%">
        </colgroup>
<table class="table table-striped table-hover">
		<thead>
			<tr><h4 align="center">Turno Mañana</h4></tr>
			<tr><th class="col-xs-2">Grupo</th>
			<th class="col-xs-2">Titulo</th>
			<th class="col-xs-5">Descripcion</th>
			<th class="col-xs-1">Inicio</th>
			<th class="col-xs-1">Término</th>
			<th class="col-xs-1">Status</th></tr>
		</thead>
		<tbody>
			<?php
				while($lista1 = mysql_fetch_array($dia)){
					echo "<tr><td class='col-xs-2'>".$lista1['tipo']."</td>";
					echo utf8_decode("<td class='col-xs-2'>".$lista1['titulo']."</td>");
					echo utf8_decode("<td class='col-xs-5'>".$lista1['descripcion']."</td>");
					echo "<td class='col-xs-1'>".$lista1['inicio']."</td>";
					echo "<td class='col-xs-1'>".$lista1['fin']."</td>";
					echo "<td class='col-xs-1'>".$lista1['estatus']."</td></tr>";
				}
			?>
		</tbody>

</table>
<table class="table table-striped table-hover">
		<thead>
			<tr><h4 align="center">Turno Tarde</h4></tr>
			<tr><th class="col-xs-2">Grupo</th>
			<th class="col-xs-2">Titulo</th>
			<th class="col-xs-5">Descripcion</th>
			<th class="col-xs-1">Inicio</th>
			<th class="col-xs-1">Término</th>
			<th class="col-xs-1">Status</th></tr>
		</thead>
		<tbody>
			<?php
				while($lista1 = mysql_fetch_array($tarde)){
					echo "<tr><td class='col-xs-2'>".$lista1['tipo']."</td>";
					echo utf8_decode("<td class='col-xs-2'>".$lista1['titulo']."</td>");
					echo utf8_decode("<td class='col-xs-5'>".$lista1['descripcion']."</td>");
					echo "<td class='col-xs-1'>".$lista1['inicio']."</td>";
					echo "<td class='col-xs-1'>".$lista1['fin']."</td>";
					echo "<td class='col-xs-1'>".$lista1['estatus']."</td></tr>";
				}
			?>
		</tbody>

</table>
<table class="table table-striped table-hover">
				<thead>
					<tr><h4 align="center">Turno Noche</h4></tr>
					<tr><th class="col-xs-2">Grupo</th>
					<th class="col-xs-2">Titulo</th>
					<th class="col-xs-5">Descripcion</th>
					<th class="col-xs-1">Inicio</th>
					<th class="col-xs-1">Término</th>
					<th class="col-xs-1">Status</th></tr>
				</thead>
				<tbody>
					<?php
						while($lista1 = mysql_fetch_array($noche)){
							echo "<tr><td class='col-xs-2'>".$lista1['tipo']."</td>";
							echo utf8_decode("<td class='col-xs-2'>".$lista1['titulo']."</td>");
							echo utf8_decode("<td class='col-xs-5'>".$lista1['descripcion']."</td>");
							echo "<td class='col-xs-1'>".$lista1['inicio']."</td>";
							echo "<td class='col-xs-1'>".$lista1['fin']."</td>";
							echo "<td class='col-xs-1'>".$lista1['estatus']."</td></tr>";
						}
					?>
				</tbody>

		</table>

</div>
<form action="functions/excel.php" method="post" target="_blank" id="FormularioExportacion">
<button class="btn btn-success botonExcel" /><i class="fa fa-file-excel-o"></i> Exportar a Excel</button>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />

</form>
<button class="btn btn-danger" name="button" onclick="javascript:demoFromHTML();"><i class="fa fa-file-pdf-o"></i> Exportar a PDF</button>
<script language="javascript">
$(document).ready(function() {
$(".botonExcel").click(function(event) {
$("#datos_a_enviar").val( $("<div>").append( $("#exportar").eq(0).clone()).html());
$("#FormularioExportacion").submit();
});
});
</script>

<script type="text/javascript">
function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#exportar')[0];

    // we support special element handlers. Register them with jQuery-style
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of <sel></sel>ectors
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF
        //          this allow the insertion of new lines after html
        pdf.save('Test.pdf');
    }, margins);
}
</script>
