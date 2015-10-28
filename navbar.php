<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Bitacora Diaria</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://pconvm212/bitacora">Bitacora Diaria <small>operacpd</small></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav" id="myTab">
        <li><a href="#notas" data-toggle="tab" >Notas <span class="badge"><?php echo "$notasvigentes"; ?></span></a></li>
        <li class="active"><a href="#insertar" data-toggle="tab">Insertar <span class="badge"><?php echo "$entradasvigentes"; ?></a></li>
        <li><a href="#editar" data-toggle="tab">Editar</a></li>
        <li class="disabled"><a href="#exportar" data-toggle="tab">Exportar</a></li>
        <li class="disabled"><a href="#checklist" data-toggle="tab">Checklist</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Ingrese Parámetro">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./panel">Bienvenido | <strong><?php echo $usuario; ?></strong></a></li>
        <li><a href="#" onclick="location.reload();location.href='functions/logout.php'">Desconectarse</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>

