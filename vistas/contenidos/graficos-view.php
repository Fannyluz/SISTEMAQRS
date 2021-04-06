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
                      <li class="nav-item">
                        <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="false" >
                            <i class="fa fa-home fa-sm"></i> General
                        </a>
                      </li>
                    </ul>

<?php 
	                                  require_once "./controladores/ActividadQrsControlador.php";
	                                  $casos=new ActividadQrsControlador();
	                                  $datos=$casos->listar_ActividadQrsAll_Reporte_controlador();
	                                  $count=1;
	                                  $nuevoestado="Activo";?>


<?php 
	                                  require_once "./controladores/ActividadQrsControlador.php";
	                                  $tipos=new ActividadQrsControlador();
	                                  $datostipo=$tipos->listar_ActividadQrsAll_ReporteTipo_controlador();
	                                  $count=1;
	                                  $nuevoestado="Activo";?>


	                                  <?php 
	                                  require_once "./controladores/ActividadQrsControlador.php";
	                                  $comparativos=new ActividadQrsControlador();
	                                  $datoscomparativos=$comparativos->listar_ActividadQrsAll_ReporteComparativo_controlador();
	                                  ;?>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<form>

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
        text: 'Porcentaje de actividades por caso - DONUT'
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
        name: 'Porcentaje de casos',
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
				        text: 'Actividades por caso - 3D'
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
            <?php  foreach($datostipo as $rowtipo){ 
				        ?>
				        	['<?php echo $rowtipo['TIPnombre']?>'],
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
        data: [<?php  foreach($datoscomparativos as $rowcomparativos){ 
				        ?>

				        	[<?php echo $rowcomparativos['Contador']?>],

				        	<?php } ?>]

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

		<div class="col-md-6">

			
		</div>




     </div>

                             
    </form>
                           
  </div>



    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <form>
             
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
			        text: 'Actividades por tipo- PIRAMIDE',
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
			    
			 <?php  foreach($datostipo as $rowtipo){ 
			                        	echo " ['".$rowtipo['TIPnombre']."', ".$rowtipo['Contador']."],";
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
				        text: 'Actividades por tipo - CYLINDER'
				    },
				    
				    plotOptions: {
        series: {
            depth: 25,
            colorByPoint: true
        }
    },
				    xAxis: {
				        categories: [
				        <?php  foreach($datostipo as $rowtipo){ 
				        ?>
				        	['<?php echo $rowtipo['TIPnombre']?>'],
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
				        <?php  foreach($datostipo as $rowtipo){ 
				        ?>

				        	[<?php echo $rowtipo['Contador']?>],

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
<form>

<input id="buscar" name="buscar" value="2" />  


 <?php 
 
 $variable = "";
require_once "./controladores/TipoQrsControlador.php";
$tipoqrs=new TipoQrsControlador();
$datosTipoQRS=$tipoqrs->Listar_tipoqrs_estado_controlador();


if($variable=="")
{
require_once "./controladores/ActividadQrsControlador.php";
	$casos=new ActividadQrsControlador();
	$datos=$casos->listar_ActividadQrsAll_ReportePersonal_controlador();
}else
{
	require_once "./controladores/ActividadQrsControlador.php";
	$casos=new ActividadQrsControlador();
	$datos=$casos->ListaActualActividadesAll();
}
?>

<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" id="buscarP" name="buscarP">
<?php foreach($datosTipoQRS as $row){ ?>
<option value=<?php echo $row['TIPcodigo']?>><?php echo $row['TIPnombre']?></option>
<?php }?>
</select>
</div>
</div>


<button type="submit" class="btn btn-round btn-sm" onclick="buscar_cliente()" style="background-color:#10226a;color:white;">
        Buscar

        </button>
<div class="col-md-12"> 	 
	<div class="col-md-6">
			
<figure class="highcharts-figure">
    <div id="container_cilindro_Personal"></div>
   
</figure>
<div id="id"> </div>


		<script type="text/javascript">
		function buscar_cliente(){
		let input_cliente=document.querySelector('#buscar').value;
		input_cliente=input_cliente.trim();
		if(input_cliente!=""){
			let datos = new FormData(this);
			datos.append("buscar_cliente",input_cliente);

			fetch("<?php echo SERVERURL;?>ajax/ActividadQrsAjax.php",{
				method:'POST',
				body: datos
				})
	          .then(respuesta=>respuesta.text())
	          .then(respuesta => {

	       let reporte_personal=document.querySelector('#id').value;
	          });
	          reporte_personal.innerHTML=respuesta;


		}else{
			Swal.fire({
	            title: 'Ocurrio en el Titulo',
	            text: 'Debes introducir el ',
	            type: 'error',
	            confirmButtonText: 'Aceptar'
	          });
		}
		alert (input_cliente);
	}


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
				        text: 'Actividades por personal UPTvirtual - CYLINDER'
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
        text: 'Porcentaje de actividades por personal UPTvirtual - DONUT'
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
	