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

<!-- DONUT-->
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts-3d.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/exporting.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/export-data.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/accessibility.js"></script>


<!-- area basic -->
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
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

<!-- -->
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/highcharts-3d.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/Graficas/code/modules/cylinder.js"></script>
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
                         <i class="fa fa-list-alt fa-sm"></i> Caso
                     </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" >
                            <i class="fa fa-commenting-o fa-sm"></i> Tipo
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" >
                            <i class="fa fa-user fa-sm"></i> Personal
                        </a>
                      </li>
                      
                    </ul>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<form>
<?php 
	                                  require_once "./controladores/ActividadQrsControlador.php";
	                                  $casos=new ActividadQrsControlador();
	                                  $datos=$casos->listar_ActividadQrsAtendidasCasoAll_Reporte_controlador();
	                                  $count=1;
	                                  $nuevoestado="Activo";?>
<div class="col-md-12"> 	 
	<div class="col-md-6">
			<figure class="highcharts-figure">
    <div id="container_DONUT"></div>
    
</figure>


		<script type="text/javascript">
Highcharts.chart('container_DONUT', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Porcentaje de actividades atendidas por caso - DONUT'
    },accessibility: {
	                        point: {
	                            valueSuffix: '%'
	                        }
	                    },tooltip: {
	                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	                    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Porcentaje caso',
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
		    <div id="container_3D_Tipo">
		    	
		    </div>
		</figure>


		<script type="text/javascript">
				Highcharts.chart('container_3D_Tipo', {
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
				        text: 'Actividades Atendidas por caso - 3D'
				    },
				    
				    plotOptions: {
        series: {
            depth: 25,
            colorByPoint: true
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
				        name: 'Total caso',
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
					

		</div>

		<div class="col-md-6">

			
		</div>




     </div>

                             
    </form>
                           
  </div>



    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <form>
             <?php 
	                                  require_once "./controladores/ActividadQrsControlador.php";
	                                  $casos=new ActividadQrsControlador();
	                                  $datos=$casos->listar_ActividadAtendidasQrsAll_ReporteTipo_controlador();
	                                  $count=1;
	                                  $nuevoestado="Activo";?>
<div class="col-md-12"> 	 
	<div class="col-md-6">
							

		<figure class="highcharts-figure">
				    <div id="container_PIRAMIDE_tipo"></div>    
				</figure>
			<script type="text/javascript">
			Highcharts.chart('container_PIRAMIDE_tipo', {
			    chart: {
			        type: 'pyramid'
			    },
			    title: {
			        text: 'Actividades atendidas por tipo- PIRAMIDE',
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
			        name: 'Total tipo',
			        data: [
			    
			 <?php  foreach($datos as $row){ 
			                        	echo " ['".$row['TIPnombre']."', ".$row['Contador']."],";
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
    <div id="container_cilindro_Tipo"></div>
   
</figure>


		<script type="text/javascript">
Highcharts.chart('container_cilindro_Tipo', {
    chart: {
        type: 'cylinder',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
				    title: {
				        text: 'Actividades atendidas por tipo - CYLINDER'
				    },
				    
				    plotOptions: {
        series: {
            depth: 25,
            colorByPoint: true
        }
    },
				    xAxis: {
				        categories: [
				        <?php  foreach($datos as $row){ 
				        ?>
				        	['<?php echo $row['TIPnombre']?>'],
				        <?php } ?>
				        ],
				  
				    },
				    yAxis: {
				        title: {
				            text: null
				        }
				    },
				    series: [{
				        name: 'Total tipo',
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

		</div>

		<div class="col-md-6">

			
		</div>




     </div>       
      </form>
    </div>

    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
 <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST"novalidate>

     	<?php 
require_once "./controladores/TipoQrsControlador.php";
$tipoqrs=new TipoQrsControlador();
$datosTipoQRS=$tipoqrs->Listar_tipoqrs_estado_controlador();
$count=1;
$nuevoestado="Activo";
?>
<input type="hidden" name="BuscarPorTipo" value="exportAtendidasAll" />   

<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" name="buscarTipoPersonal_Reporte">
<?php foreach($datosTipoQRS as $row){ ?>
<option value=<?php echo $row['TIPcodigo']?>><?php echo $row['TIPnombre']?></option>
<?php }?>
</select>
</div>
</div>

<button type="submit" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
        Buscar

        </button>


             <?php 
	                                  require_once "./controladores/ActividadQrsControlador.php";
	                                  $casos=new ActividadQrsControlador();
	                              $datos=$casos->listar_ActividadesAtendidasQrsAll_ReportePersonal_controlador();
	                                  $count=1;
	                                  $nuevoestado="Activo";?>
<div class="col-md-12"> 	 
	<div class="col-md-6">
			
<figure class="highcharts-figure">
    <div id="container_cilindro_Personal"></div>
   
</figure>


		<script type="text/javascript">
Highcharts.chart('container_cilindro_Personal', {
    chart: {
        type: 'cylinder',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
				    title: {
				        text: 'Actividades atendidas por personal UPTvirtual - CYLINDER'
				    },
				    plotOptions: {
        series: {
            depth: 25,
            colorByPoint: true
        }
    },
				    xAxis: {
				        categories: [
				        <?php  foreach($datos as $row){ 
				        ?>
				        	['<?php echo $row['PEUnombres']?>'],
				        <?php } ?>
				        ],
				  
				    },
				    yAxis: {
				        title: {
				            text: null
				        }
				    },
				    series: [{
				        name: 'Total personal',
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
		
	<div class="col-md-6">

		


		<figure class="highcharts-figure">
    <div id="container_DONUT_Personal"></div>
    
</figure>


		<script type="text/javascript">
Highcharts.chart('container_DONUT_Personal', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Porcentaje de actividades atendidas por personal UPTvirtual - DONUT'
    },accessibility: {
	                        point: {
	                            valueSuffix: '%'
	                        }
	                    },tooltip: {
	                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	                    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Porcentaje personal',
        data: [
            <?php  foreach($datos as $row){ 
	                        	echo " ['".$row['PEUnombres']."', ".$row['Contador']."],";
	                          }  
	                        ?>
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
					

		</div>

		<div class="col-md-6">

		</div>




     </div>       
      </form>
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
	