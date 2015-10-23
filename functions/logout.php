<?php
session_start();
session_destroy(); 
?>
<script>
	window.alert("Desconectado Correctamente");
	location.href = "../index.php";
</script> 
