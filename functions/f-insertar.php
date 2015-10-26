<?php
session_start();
require_once ('funciones.php');

$fecha = date("Y-m-d");
$inicio = $_POST['inicio'];
$inicio = noTime($inicio);
$fin = $_POST['fin'];
$fin = noTime($fin);
$estado = designaEstado($inicio, $fin);

$validador = array();
/*Validaciones no vacios*/
if(isset($_POST['titulo']) and !empty($_POST['titulo'])){
	$validador[] = true;
}else{
	$validador[] = false;
}

if($_POST['proceso'] != "null"){
	$validador[] = true;
}else{
	$validador[] = false;
}

if(!empty($$_POST['desc'])){
	$validador[] = true;
}else{
	$validador[] = false;
}

if($estado != "null"){
	$validador[] = true;
}else{
	$validador[] = false;
}
	

  
 //*recorrer array validando*/
$contador = '0';
foreach ($validador as $valor) {
	if($valor === false){
		++$contador;
	}
}
//*convertir datos a SQL*//




//*Insertar entrada*//
//$fecha = validaTurno($turno, $fecha, $inicio, $fin);
if($contador === '0'){
	$ingreso = array(	fecha => $fecha,
						inicio => $inicio,
						termino => $fin,
						proceso => $proceso,
						usuario => $usuario,
						estatus => $estado,
						turno => $_SESSION['turno'],
						titulo => $_SESSION['titulo'],
						descripcion => $_SESSION['desc']);
	inserta_entrada($ingreso);
	
	header('Location: ../index.php#insertar');
	
	//location.href = "../index.php#insertar";
	
	//echo "se puede ingresar";
}else{
		
	//header('Location: ../index.php#insertar');	
	
	echo "error en la validacion";
}

header('Location: ../index.php#insertar');

//var_dump($ingreso); 


?>

