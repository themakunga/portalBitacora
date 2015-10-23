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
	<div class="form-group">
      <div class="col-lg-10">
        <button type="submit" class="btn btn-success" name="login">Ingresar</button>
        <button type="submit" class="btn btn-info" value="Crear usuario" onclick="javascript:newPopup('sections/crea_login.php');">Crea Usuario</button>
      </div>
    </div>
</fieldset>
</form>


<script>
  function newPopup(sitio){
    var opciones = "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=550, height=470, top=85, left=140";
    window.open(sitio,"",opciones);
  }
</script>
 

