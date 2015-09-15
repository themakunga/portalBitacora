<?php $res = listaTurno(); ?>

<h1>Ingresar</h1>
<form class="form-horizontal" name="login" method="post" action="functions/f-login.php">
<fieldset>
    <div class="form-group">
    	<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Usuario</label>
      <div class="col-lg-4">
        <input type="text" name="usuario" class="form-control" id="inputEmail" placeholder="Ingrese Usuario">
      </div>
    </div
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
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary" name="login">Ingresar</button>
        <button type="submit" class="btn btn-primary" value="Crear usuario" onclick="javascript:newPopup_login('sections/crea_login.php');">Crea Usuario</button>
      </div>
    </div>
</fieldset>
</form>



 

