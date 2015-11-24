<?php
include('functions/conexion.php');

$q = mysql_query("SELECT COUNT(*) FROM lista WHERE fecha BETWEEN current_date()-30 AND current_date();");
$r = mysql_result($q, 0);


$i = 1;
$c = 0;
while($c < 11){
  $q1 = mysql_query("SELECT COUNT(*) FROM lista WHERE fecha BETWEEN current_date()-30 AND current_date() AND proceso = '".$i."';");
  $res[$c] = mysql_result($q1, 0);
  $c = $c + 1;
  $i++;
}
$array['monitoreo'] = round((($res[0] * 100)/$r), 1);
$array['vtime'] = round((($res[1] * 100)/$r), 1);
$array['etl'] = round((($res[2] * 100)/$r), 1);
$array['carga'] = round((($res[3] * 100)/$r), 1);
$array['respaldos'] = round((($res[4] * 100)/$r), 1);
$array['impresion'] = round((($res[5] * 100)/$r), 1);
$array['reinicios'] = round((($res[6] * 100)/$r), 1);
$array['cotval'] = round((($res[7] * 100)/$r), 1);
$array['turno'] = round((($res[8] * 100)/$r), 1);
$array['varios'] = round((($res[9] * 100)/$r), 1);
$array['otros'] = round((($res[10] * 100)/$r), 1);
var_dump($array);
 ?>
