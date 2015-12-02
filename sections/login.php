<?php $res = listaTurno(); ?>

<h2>Ingresar</h2>
<form class="form-horizontal" name="login" method="post" action="functions/f-login.php">
<fieldset class="well bs-component col-lg-8">
    <div class="form-group">
    	<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Usuario</label>
      <div class="col-lg-4">
        <input type="text" name="usuario" class="form-control" id="inputEmail" placeholder="Ingrese Usuario">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-4">
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
      </div>
    </div>
	<div class="form-group">
    	<label for="select" class="col-lg-2 control-label">Elije Turno</label>
    	<div class="col-lg-4">
     		<select class="form-control" id="select" name="turno">
      			<option value="null">Turnos</option>
      			<?php
      				while($list = mysql_fetch_array($res)){
      					echo utf8_encode("<option value=".$list['id'].">".$list['valor']."</option> ");
      			} ?>
      		</select>
    	</div>
    </div>
    <br>
    <br>

      <span class="col-lg-10">
        <button type="submit" class="btn btn-success" name="login">Ingresar</button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalNewUser">Crea Usuario</button>
      </span>
</fieldset>
</form>


<form class="" action="./functions/f-user.php" method="post" data-toggle="validator">
<div class="modal fade" id="ModalNewUser" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Crear Nueva Cuenta</h4>
      </div>
      <div class="modal-body">

          <div class="form-group has-feedback">
            <label for="usuario" class="control-label">Username</label>
            <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" data-error="solo usar caracteres alfanumericos y _" class="form-control" name="usuario" placeholder="Ingrese nombre usuario" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
          <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre completo" required>
          </div>
          <div class="form-group">
            <label for=""></label>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Ingrese password" required>
          </div>
          <div class="form-group">
            <label for=""></label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repita password" data-match="#password1" data-match-error="Que sean las dos iguales!" required>
          </div>
          <div class="form-group">
            <label for=""></label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              <input type="email" class="form-control" name="mail" placeholder="Ingrese correo personal" required>

            </div>


          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="input" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>
</form>
