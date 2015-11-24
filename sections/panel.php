<?php
$usuario = $_SESSION['nombre'];
$saludo = saludoNew(date('H:m'));
$bitacora = UltimaBitacora();
$botonBitacora = botonBitacora($bitacora);
?>

<div class="well container">
  <h2><?php echo $saludo;?></h2> <h3><?php echo $usuario; ?></h3>
  <p>
    <form class="" action="functions/opciones.php" method="post">
  <?php echo $botonBitacora; ?>
    </form>
  </p>
<p>

  <?php
  //echo $_SESSION['id'];
    echo totalesEstatus(mysql_result($bitacora, 0));
  ?>
  <div class="col-xs-3">
    <span class="label label-success"> Entradas Ejecutadas y Finalizadas <span class="glyphicon glyphicon-ok"></span> </span>
  </div>
  <div class="col-xs-3">
    <span class="label label-primary"> Entradas En Ejecucion <span class="glyphicon glyphicon-time"></span></span>
  </div>
  <div class="col-xs-3">
    <span class="label label-warning"> Entradas Pendientes <span class=" glyphicon glyphicon-inbox"></span></span>
  </div>
  <div class="col-xs-3">
    <span class="label label-danger"> Entradas Eliminadas <span class="glyphicon glyphicon-remove "></span> </span>
  </div>
</p>
<br>
<br>
<p>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>

  <div id="container" style="min-width: 600px; height: 600px; max-width: 600px; margin: 0 auto"></div>

</p>
</div>

 <?php
 $char = char_mes();
 var_dump($char);
?>

<script type="text/javascript">
$(function () {
  $('#container').highcharts({
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Estado de Entradas en bitacora mes +mes+'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                  style: {
                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                  }
              }
          }
      },
      series: [{
          name: 'Entradas',
          colorByPoint: true,
          data: [{
              name: 'Monitoreo',
              y: <?php echo json_encode($char['monitoreo']); ?>
          }, {
              name: 'Visual Time',
              y: <?php echo json_encode($char['vtime']); ?>,
              sliced: true,
              selected: true
          }, {
              name: 'ETL - DataStage',
              y: <?php echo json_encode($char['etl']);?>
          }, {
              name: 'Carga Archivos',
              y: <?php echo json_encode($char['carga']);?>
          }, {
              name: 'Respaldos',
              y: <?php echo json_encode($char['respaldos']);?>
          }, {
              name: 'Impresion',
              y: <?php echo json_encode($char['impresion']);?>
          }, {
              name: 'Reinicios',
              y: <?php echo json_encode($char['reinicios']);?>
          }, {
            
          }]
      }]
  });
});
</script>
