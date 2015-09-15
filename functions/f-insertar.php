<?php
session_start();
require_once ('funciones.php');

$usuario = $_SESSION['id'];
$turno = $_SESSION['turno'];
$fecha = date("Y-m-d");
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$titulo = $_POST['titulo'];
$proceso =$_POST['proceso'];
$descripcion = $_POST['desc'];
$estado = designaEstado($_POST['inicio'],$_POST['fin']);

$validador = array();
/*Validaciones no vacios*/
if(isset($titulo) and !empty($titulo)){
	$validador[] = true;
}else{
	$validador[] = false;
}

if($proceso != "null"){
	$validador[] = true;
}else{
	$validador[] = false;
}

if(!empty($descripcion)){
	$validador[] = true;
}else{
	$validador[] = false;
}

	
	

  
 //*recorrer array validando*/
$contador = '0';
foreach ($validador as $valor) {
	if($valor == false){
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
						turno => $turno,
						titulo => $titulo,
						descripcion => $descripcion);
	//inserta_entrada($ingreso);
	
	//header('Location: ../index.php#insertar');
	
	//location.href = "../index.php#insertar";
	
	echo "se puede ingresar";
}else{
		
	//header('Location: ../index.php#insertar');	
	
	echo "error en la validacion";
}

//header('Location: ../index.php#insertar');

var_dump($ingreso);


?>

