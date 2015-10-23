<?php
require_once ('../functions/funciones.php');


?>
<head>
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.css" media="screen"></link>
</head>
<body>
<form name="creausu" method="post" action="../functions/f-user.php">
<div class="well bs-component col-lg-6">
  <div class="login">
	<h1>Crea Usuario</h1>
	
	<p><input type="text" class="form-control" name="usuario" placeholder="Ingrese nombre usuario"></p>
	<p><input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre completo"></p>
	<p><input type="password" class="form-control" name="password1" placeholder="Ingrese password"></p>
	<p><input type="password" class="form-control" name="password2" placeholder="Repita password"></p>
	<p><input type="email" class="form-control" name="mail" placeholder="Ingrese correo personal"></p>
	
	
	<p class="submit">
		<input type="submit"  class="btn btn-success"  name="login" value="Ingresar">
		<input type="reset"  class="btn btn-warning"  name="reset" value="Limpiar">
		<input type="button"  class="btn btn-default"  name="cerrar" value="Cerrar" onclick="javascript:window.close()">
	</p>
  </div>
 
</div>

</form>
</body>