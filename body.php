<?php require ('scripts/js_base/js_scripts.php');?>
<body>
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="dist/jquery-clockpicker.min.js"></script>
	<script src="js/validator.js"></script>
	<script src="js/jspdf.debug.js"></script>


	<div id="header">
		<br>
		<br>
	</div>
<div class="container">
<?php
$result = listadoNotas();
$entra = contarActivas();
$notasvigentes = mysql_num_rows($result);
$entradasvigentes = mysql_fetch_array($entra);
$entradasvigentes = $entradasvigentes['contar'];
//session_start();
if(!empty($_SESSION['usuario'])){
	$usuario = $_SESSION['nombre'];
	include('navbar.php');
	?>

	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade" id="panel">
			<p>
				<?php
					include 'sections/panel.php';
				?>
			</p>
		</div>
		<div class="tab-pane fade" id="notas">
			<p>
				<?php
					include 'sections/notice.php';
				?>
			</p>
		</div>
		<div class="tab-pane fade in active" id="insertar">
			<p>
				<?php
					include 'sections/main-insert.php';
					//include 'sections/insertar.php';
					include 'sections/activas.php';
					include 'sections/ultimas.php';
				?>
			</p>
		</div>
		<div class="tab-pane fade" id="editar">
			<p>
				<?php
					include 'sections/editar.php';
				?>
			</p>
		</div>
		<div class="tab-pane fade" id="exportar">
			<p>
				<?php
				 	include 'sections/exportar.php'
				 ;?>
			</p>
		</div>
		<div class="tab-pane" id="checklist">
			<p>
				<?php include 'sections/checklist.php';?>
			</p>
		</div>

	</div>
</div>

<script>
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');
</script>
<?php
	}else{
		include_once('sections/login.php');

	}



?>
