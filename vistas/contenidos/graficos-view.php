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
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts-3d.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/exporting.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/export-data.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/accessibility.js"></script>

<!-- PIRAMIDE-->
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/funnel.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/exporting.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/export-data.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/accessibility.js"></script>

<!--3D -->
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts-3d.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/exporting.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/export-data.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/accessibility.js"></script>

<!-- COLUMNAS COMPARATIVAS -->
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/data.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/exporting.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/accessibility.js"></script>


<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
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

                      <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" > 
                         <i class="fa fa-users fa-sm"></i> Por Caso
                     </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" >
                            <i class="fa fa-graduation-cap fa-sm"></i> Por Tipo
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" >
                            <i class="fa fa-user fa-sm"></i> Por Personal
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="false" >
                            <i class="fa fa-user fa-sm"></i> General
                        </a>
                      </li>
                    </ul>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<form>

<div class="col-md-12"> 	 
	<div class="col-md-6">
		
	            <figure class="highcharts-figure">
	                <div id="container_PIE"></div>
	            </figure>

	                              <?php 
	                                  require_once "./controladores/ActividadQrsControlador.php";
	                                  $casos=new ActividadQrsControlador();
	                                  $datos=$casos->listar_ActividadQrsAll_Reporte_controlador();
	                                  $count=1;
	                                  $nuevoestado="Activo";?>
	                                  
	                		<script type="text/javascript">
	                Highcharts.chart('container_PIE', {
	                    chart: {
	                        type: 'pie',
	                        options3d: {
	                            enabled: true,
	                            alpha: 45,
	                            beta: 0
	                        }
	                    },
	                    title: {
	                        text: 'REPORTE DE ACTIVIDADES POR CASOS - PALETA'
	                    },
	                    accessibility: {
	                        point: {
	                            valueSuffix: '%'
	                        }
	                    },
	                    tooltip: {
	                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	                    },
	                    plotOptions: {
	                        pie: {
	                            allowPointSelect: true,
	                            cursor: 'pointer',
	                            depth: 35,
	                            dataLabels: {
	                                enabled: true,
	                                format: '{point.name}'
	                            }
	                        }
	                    },
	                    series: [{
	                        type: 'pie',
	                        name: 'Total caso',
	                        data: [
	                        <?php  foreach($datos as $row){ 
	                        	echo " ['".$row['CASnombre']."', ".$row['Contador']."],";
	                          }  
	                        ?>
	                        ]
	                    }]
	                });
	    </script>     
	  		
	</div>
		
	<div class="col-md-6">

		<figure class="highcharts-figure">
		    <div id="container_3D">
		    	
		    </div>
		</figure>


		<script type="text/javascript">
				Highcharts.chart('container_3D', {
				    chart: {
				        type: 'column',
				        options3d: {
				            enabled: true,
				            alpha: 10,
				            beta: 25,
				            depth: 70
				        }
				    },
				    title: {
				        text: 'REPORTE DE ACTIVIDADES POR CASOS - 3D'
				    },
				    subtitle: {
				        text: 'Notice the difference between a 0 value and a null point'
				    },
				    plotOptions: {
				        column: {
				            depth: 25
				        }
				    },
				    xAxis: {
				        categories: [
				        <?php  foreach($datos as $row){ 
				        ?>
				        	['<?php echo $row['CASnombre']?>'],
				        <?php } ?>
				        ],
				  
				    },
				    yAxis: {
				        title: {
				            text: null
				        }
				    },
				    series: [{
				        name: 'Casos',
				        data: [
				        <?php  foreach($datos as $row){ 
				        ?>

				        	[<?php echo $row['Contador']?>],

				        	<?php } ?>
				        ]
				         
				    }]
				});
						</script>
	</div>

</div>
         


     <div class="col-md-12"> 	
		 <hr noshade="noshade" color="#10226a">
		<hr noshade="noshade" color="#fdaf17">
		<hr noshade="noshade" color="#10226a">
		<div class="col-md-6">
					<figure class="highcharts-figure">
				    <div id="container_PIRAMIDE"></div>    
				</figure>
			<script type="text/javascript">
			Highcharts.chart('container_PIRAMIDE', {
			    chart: {
			        type: 'pyramid'
			    },
			    title: {
			        text: 'REPORTE DE ACTIVIDADES POR CASOS - PIRAMIDE',
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
			        name: 'Total caso',
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
		</div>

		<div class="col-md-6">

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        A basic column chart compares rainfall values between four cities.
        Tokyo has the overall highest amount of rainfall, followed by New York.
        The chart is making use of the axis crosshair feature, to highlight
        months as they are hovered over.
    </p>
</figure>



		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            <?php  foreach($datos as $row){ 
				        ?>
				        	['<?php echo $row['TIPnombre']?>'],
				        <?php } ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
		</script>
		</div>




     </div>
                                         
    </form>
                           
  </div>



    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <form>
              eer       ee         
      </form>
    </div>

    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
     ptrp
    </div>

    <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
     GENERAL
    </div>
</div>
                       



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
	include "./vistas/inc/validator.php"
	?>
	