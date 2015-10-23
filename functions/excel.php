<?php

$date = date("d-m-Y");
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=bitacora_".$date.".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $_POST['datos_a_enviar'];
?>