<?php
require('conexion.php');
//$db_handle = new DBController();

//FUNCIONES PHP

//funciones de estructura
function get_opc($val){
	//$query = 'SELECT * FROM opciones WHERE id = "$val";';
	$query = $db_handle->runQuery('SELECT * FROM opciones WHERE id = "$val";');
	$result = mysql_query($query);

	return $result;
}


//funciones validacion
function comprobarLogin($usuario,$password){
	$query = "SELECT * FROM usuarios WHERE username = '".$usuario."' and password = '".$password."';";
	$result = mysql_query($query);

	return $result;

}


function validaTurno($turno,$fecha,$inicio,$fin){
	$query = "SELECT * FROM usuarios_turnos WHERE id = '".$turno."' AND hora_entrada < '".$inicio."' AND hora_salida >'".$fin."' ;";
	$res = mysql_query($query);
	$res = mysql_num_rows($res);
	//return $res;

	if($turno == '3' and $res >='0'){
		$fecha_fin = date("d-m-Y",strtotime ( '-1 day' , strtotime ( $fecha ) ) );
	}else{
		$fecha_fin = $fecha;
	}
	return $fecha_fin;

}

//funciones de listado

function listadoProcesos(){
	$query = "SELECT * FROM lista_procesos;";
	$result = mysql_query($query);


	return $result;

}
function list_tipo_notas(){
	$query = "SELECT * FROM notas_nivel;";
	$result = mysql_query($query);

	return $result;

}

function list_estatus_notas(){
	$query = "SELECT * FROM notas_status;";
	$result = mysql_query($query);

	return $result;

}

function listadoNotas(){
	$query = 'SELECT * FROM notas WHERE estado <> 2 order by stampa DESC;';
	$res = mysql_query($query);

	return $res;

}

function iconosNotas($id){
	$query = "SELECT estado FROM notas WHERE id = '".$id."';";
	$res = mysql_query($query);
	while($salida = mysql_fetch_array($res)){
		if ($salida['estado'] == '1') {
			$output = "<span class='label label-success'>Vigente</span>&nbsp; &nbsp; ";
		}
		else{
			if ($salida['estado'] == '2'){
				$output = "<span class='label label-danger'>Eliminada</span>&nbsp; &nbsp; ";
			}
			else{
				if ($salida['estado'] == '3'){
					$output = "<span class='label label-warning'>Importante</span>&nbsp; &nbsp; ";
				}
				else{
					if($salida['estado'] == '4'){
						$output = "<span class='label label-info'>En Evaluacion</span>&nbsp; &nbsp; ";
					}
				}
			}
		}

	}

	return $output;
}

function iconoPend($id){
	$query = "SELECT estatus FROM lista WHERE id = '".$id."';";
	$res = mysql_query($query);
	while ($salida = mysql_fetch_array($res)){
		if ($salida['estatus'] == '5'){
			$output = "<span class='label label-warning'>Pendiente</span>";
		}else{
			if ($salida['estatus'] = '2'){
				$output = "<span class='label label-primary'>En ejecucion</span>";
			}
		}

	}
	return $output;
}

function obtener_notas($id){
	$query = "SELECT * FROM notas WHERE id = '".$id."' and estado <> '2';";
	$res = mysql_query($query) or mysql_error();

	return $res;
}

function ultimasNotas(){
	$query = "SELECT 	n.id as id,
						n.fecha_crea as fecha,
						n.descripcion as descripcion,
						u.username as usuario,
						e.valor as estado,
						i.valor as importancia,
						n.fecha_edit as modificacion
	FROM notas n, usuarios u, notas_status e, notas_nivel i
			WHERE n.estado = e.id
			AND n.importancia = i.id
			AND	n.estado <> '1'
			AND n.usuario = u.id
			ORDER BY n.id DESC;";
	$res = mysql_query($query);

	return $res;
}

function listaTurno(){
	$query = "SELECT * FROM usuarios_turnos;";
	$result = mysql_query($query);

	return $result;

}

function ultimasEntradas(){
	$query = "	SELECT 	l.id,
						p.descripcion as tipo,
        				l.titulo,
        				l.descripcion,
        				l.hora_inicio as inicio,
        				l.hora_termino as fin,
        				e.valor as estatus
				FROM   	lista l,
        				lista_procesos p,
        				lista_status e,
        				usuarios u
				WHERE   l.proceso = p.id
				AND     l.estatus = e.id
				AND     l.usuario = u.id
				ORDER BY l.id
				DESC LIMIT 10;";
	$result = mysql_query($query);

	return $result;
}

function entradasEjecucion(){
		$query = "	SELECT 	l.id,
						p.descripcion as tipo,
        				l.titulo,
        				l.descripcion,
        				l.hora_inicio as inicio,
        				l.hora_termino as fin,
        				e.valor as estatus
				FROM   	lista l,
        				lista_procesos p,
        				lista_status e,
        				usuarios u
				WHERE   l.proceso = p.id
				AND     l.estatus = e.id
				AND     l.usuario = u.id
				AND		l.estatus <> '1'
				AND		l.estatus <> '3'
				AND 	l.estatus <> '4'
				ORDER BY l.id
				DESC LIMIT 10;";
	$result = mysql_query($query);

	return $result;

}

function contarActivas() {
	$query = "SELECT COUNT(*) as contar FROM lista WHERE estatus <> '1' AND estatus <> '3' AND estatus <> '4';";
	$res = mysql_query($query);

	return $res;
}

function entradaTurno($fecha,$turno){
		$query = "	SELECT 	l.id,
						p.descripcion as tipo,
        				l.titulo,
        				l.descripcion,
        				l.hora_inicio as inicio,
        				l.hora_termino as fin,
        				l.fecha as fecha,
        				l.turno as turno,
        				e.valor as estatus
				FROM   	lista l,
        				lista_procesos p,
        				lista_status e,
        				usuarios u
				WHERE   l.proceso = p.id
				AND     l.estatus = e.id
				AND     l.usuario = u.id
				AND		l.fecha = '".$fecha."'
				AND		l.turno = '".$turno."'
				ORDER BY l.id;";
	$result = mysql_query($query);

	return $result;

}

//funciones de conversor
function convertir_fecha($date,$val){
	if($val == 0){
		$fecha = date("Y-m-d",strtotime($date));
	}else{
		$fecha = date("d-m-Y",strtotime($date));
	}

	return $fecha;
}

function fecha_visible($date,$val){
	if($val == 0){
		$fecha = date("Y-m-d H:i:s",strtotime($date));
	}else{
		$fecha = date("d-m-Y H:i:s",strtotime($date));
	}

	return $fecha;

}

function noTime($input){
	if(!empty($input)){
		$res = $input;
	}else{
		$res = "EE:EE";
	}

	return $res;
}

function designaEstado($inicio, $fin){
	if(!empty($inicio) and !empty($fin)){
		if($inicio === "EE:EE" and $fin === "EE:EE"){
			$res = "null";
		}else{
			if($inicio === "EE:EE" and $fin <> "EE:EE"){
				$res = "3";
			}else{
				if($inicio <> "EE:EE" and $fin === "EE:EE"){
					$res = "2";
				}else{
					if($inicio === $fin){
						$res = "4";
					}else{
						$res = "1";

					}
				}
			}
		}

	}

	return $res;
}

//updates
function newEstado_nota($id,$usuario){
	$query = "UPDATE notas SET estado = '2', fecha_edit = current_timestamp, usuario = '".$usuario."' WHERE id = '".$id."';";
	//$query = "UPDATE notas SET estado = '2', fecha_edit = current_timestamp, usuario  WHERE id = '".$id."';";
	$res = mysql_query($query);

	return $res;

}

function revalida_nota($id,$usuario){
	$query = "UPDATE notas SET estado = '1', fecha_edit = current_timestamp, usuario = '".$usuario."' WHERE id = '".$id."';";
	//$query = "UPDATE notas SET estado = '1', fecha_edit = current_timestamp  WHERE id = '".$id."';";
	$res = mysql_query($query);

	return $res;

}

function nota_edit($array){
	$query = "UPDATE notas SET fecha_edit = current_timestamp,
								estado = '".$array['estatus']."',
								importancia = '".$array['tipo']."',
								usuario = '".$array['usuario']."',
								descripcion = '".$array['texto']."'
						WHERE id = '".$array['id']."';";

	$res = mysql_query($query);

	return $res;
}

//inserciones

function crea_usuario($array){

	$query = "INSERT INTO usuarios (id,username, fullname, email, password, level)
			VALUES (null, '".$array['usuario']."', '".$array['nombre']."', '".$array['mail']."', '".$array['password']."', '5' ); ";
	$res = mysql_query($query);

	return $res;

}

function inserta_nota($array){
	$query = "INSERT INTO notas (id, stampa, fecha_crea, fecha_edit, estado, importancia, usuario, descripcion)
			VALUES (null,
				current_timestamp,
				current_date,
				current_timestamp,
				'".$array['estado']."',
				'".$array['importancia']."',
				'".$array['usuario']."',
				'".$array['notas']."');";
	$res = mysql_query($query);

	return $res;
}

function inserta_entrada($ingreso){
	$query = "INSERT INTO lista (id, marca, fecha, hora_inicio, hora_termino, proceso, usuario, estatus, turno, titulo, descripcion)
			VALUES (null,
					current_timestamp,
					'".$ingreso['fecha']."',
					'".$ingreso['inicio']."',
					'".$ingreso['termino']."',
					'".$ingreso['proceso']."',
					'".$ingreso['usuario']."',
					'".$ingreso['estatus']."',
					'".$ingreso['turno']."',
					'".$ingreso['titulo']."',
					'".$ingreso['descripcion']."');";
			$res = mysql_query($query);

	return $res;
}

function listaChklst(){
	$query = "SELECT * FROM  chklist_list_main ORDER BY chklist_list_main.horario ASC;";
	$res = mysql_query($query);

	return $res;
}

function validaDate($opc){
	$var = date("D", $opc);
	switch ($opc) {
		case 'Mon':
			$resp = 'L';
			break;
		case 'Tue':
			$resp = 'M';
			break;
		case 'Wed':
			$resp = 'N';
			break;
		case 'Thu':
			$resp = 'J';
			break;
		case 'Fri':
			$resp = 'V';
			break;
		case 'Sat':
			$resp = 'S';
			break;
		case 'Sun':
			$resp = 'D';
			break;
		default:
			$resp = 'X';
			break;
	}
}
?>
