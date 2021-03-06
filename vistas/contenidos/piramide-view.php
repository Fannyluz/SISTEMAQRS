<style type="text/css">
#container {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

		</style>

<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/funnel.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/exporting.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/export-data.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/accessibility.js"></script>

<?php 
if($_SESSION['privilegio_spm']!=1){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">

                       
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>Reportes Graficos<small></small></h2>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                  <div class="x_content">

                   

        <form>
            
            <figure class="highcharts-figure">
    <div id="container_PIRAMIDE"></div>
    
</figure>

<?php 
                                  require_once "./controladores/ActividadQrsControlador.php";
                                  $casos=new ActividadQrsControlador();
                                  $datos=$casos->listar_ActividadQrsAll_Reporte_controlador();
                                  $count=1;
                                  $nuevoestado="Activo";?>

		<script type="text/javascript">
Highcharts.chart('container_PIRAMIDE', {
    chart: {
        type: 'pyramid'
    },
    title: {
        text: 'Sales pyramid',
        x: -50
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['40%', '50%'],
            width: '80%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Totalcasos',
        data: [
    
 <?php  foreach($datos as $row){ 
                        	echo " ['".$row['CASnombre']."', ".$row['Contador']."],";
                          }  
                        ?>

        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
		</script>

      
                                         
    </form>
                           
                      



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
	include "./vistas/inc/validator.php"
	?>
	