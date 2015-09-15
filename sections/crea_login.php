<?php
require_once ('../functions/funciones.php');


?>
<head>
	<link type="text/css" rel="stylesheet" href="../scripts/style/style.css" media="screen"></link>
</head>
<body>
<form name="creausu" method="post" action="../functions/f-user.php">
<div class="container">
  <div class="login">
	<h1>Crea Usuario</h1>
	
	<p><input type="text" name="usuario" placeholder="Ingrese nombre usuario"></p>
	<p><input type="text" name="nombre" placeholder="Ingrese nombre completo"></p>
	<p><input type="password" name="password1" placeholder="Ingrese password"></p>
	<p><input type="password" name="password2" placeholder="Repita password"></p>
	<p><input type="email" name="mail" placeholder="Ingrese correo personal"></p>
	
	
	<p class="submit"><input type="submit"  class="boton_sec"  name="login" value="Ingresar">
	<input type="reset"  class="boton_sec"  name="reset" value="Limpiar">
	<input type="button"  class="boton_sec"  name="cerrar" value="Cerrar" onclick="javascript:window.close()"></p>
  </div>
 
</div>

</form>
</body>