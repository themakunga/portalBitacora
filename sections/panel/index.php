<?php
session_start();
include_once('usr-header.php');
include_once('usr-nav.php');
if(!empty($_SESSION['id'])){
$ar_usr = datosUser($_SESSION['id']);
while($ls = mysql_fetch_array($ar_usr)){
 ?>
 <div class="container">


 <header>
   <h2><?php echo $ls['fullname'];?>|<small> Panel de Administracion</small></h2>
 </header>

<div class="well-lg">
  <div class="col-xs-3">

  </div>
  <form class="form col-xs-6" action="functions/updateUsuario.php" method="post">
    <div class="form-group">
      <label for="username"></label>
      <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?php echo $ls['username']?>">
      <p class="help-block">Username.</p>
    </div>
    <div class="form-group">
      <label for="nombre"></label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="" value="<?php echo $ls['fullname'];?>">
      <p class="help-block">Nombre Completo.</p>
    </div>
    <div class="form-group">
      <label for="correo"></label>
      <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $ls['email'];?>">
      <p class="help-block">Correo electronico.</p>
    </div>
  </form>
  <?php }?>
  <div class="col-xs-3">

  </div>
  <?php }else{?><div class="alert alert-dismissible alert-danger container text-center">
    <h2><span class="glyphicon glyphicon-alert"></span> No tienes acceso a esta seccion, favor regresar a la bitacora <span class="glyphicon glyphicon-alert"></span></h2>
    <p><button type="button" class="btn btn-primary btn-lg">
      <a href="../../">Regresar a Bitacora</a>
    </button></p>
  </div>
  <?php }?>
</div>
</div>
