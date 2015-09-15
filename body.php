<?php require ('scripts/js_base/js_scripts.php');?>
<body onload="mueveReloj()">
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="dist/jquery-clockpicker.min.js"></script>
	
	
	<div id="header">
		<img src="img/banner.png" width="110" height="83" ALIGN="left" alt="Tu compañia" />
		<H1 align="center">Bitacora de Operaciones Diarias</H1>
		<br></br>
	</div>
<div class="container">
<?php
$result = listadoNotas();
$notasvigentes = mysql_num_rows($result);
session_start();
if(!empty($_SESSION['usuario'])){
	$usuario = $_SESSION['nombre'];
	?>
		
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					Hora en el servidor <span id="cl">0</span>
				</ul>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
    			<ul class="nav navbar-nav navbar-right">
    			
    				<form class="navbar-form navbar-right" name="prueba2" method="post" action="functions/logout.php">
    					<div class="form-group">
    						Bienvenido <?php echo "$usuario"?>
    						<button type="submit" class="btn btn-default" name="endsess">Cerrar Sesion</button>
    					</div>
    				</form>
    			</ul>
    		</div>
    	</div>
	</nav>	

	
	<ul class="nav nav-tabs nav-justified">
  		<li><a href="#home" data-toggle="tab" aria-expanded="false">Home (<?php echo "$notasvigentes"; ?>)</a></li>
  		<li class="active"><a href="#insertar" data-toggle="tab" aria-expanded="true">Insertar</a></li>
  		<li><a href="#editar" data-toggle="tab">Editar</a></li>
  		<li class="disabled"><a href="#exportar" data-toggle="tab">Exportar</a></li>
  		<li class="disabled"><a href="#checklist" data-toggle="tab">Checklist</a></li>
  	</ul>
  	
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade" id="home">
			<p><?php include 'sections/notice.php'; ?></p>
		</div>
		<div class="tab-pane fade active in" id="insertar">
			<p><?php include 'sections/insertar.php'; 
				include 'sections/activas.php';
				include 'sections/ultimas.php';?></p>
		</div>
		<div class="tab-pane fade" id="editar">
			<p><?php include 'sections/editar.php';?></p>
		</div>
		<div class="tab-pane fade" id="exportar">
			<p><?php include 'sections/exportar.php';?></p>
		</div>
		<div class="tab-pane" id="checklist">
			<p><?php include 'sections/checklist.php';?></p>
		</div>
	</div>
</div>

<?php	
	
	
	
}else{
	include_once('sections/login.php');
	
}



?>
