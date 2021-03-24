<?php 
if($_SESSION['privilegio_spm']!=1){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
        <div class="">
        

                <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">

                                <div class="x_title" style="color:#10226a;">
                                    <h2>UPTvirtual <small>Lista de Casos</small></h2>
                                     <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>                      
                                    <div class="clearfix"></div>
                                </div>
                                
            <div class="x_content">
                <div class="row">
                 <div class="col-sm-12">
                                      
                                      <div class="field item form-group">
                                            <label class="col-form-label col-md-6 col-sm-6 label-align">fecha<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="" required='required'></div>
                                </div>

                     <div class="col-sm-12">
						<div id="datatable_length">
							
	                           

                            <p align="right">
                            <a href="<?php echo SERVERURL?>agregar-casos/"  style="background-color:#fdaf17;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-plus fa-sm"></i> Nuevo
                                </a></p>
						</div>
					</div>
                                    

                                
       <br>

                                        <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        
                            <thead>
                                <tr>
                                <th>Registro</th>
                                <th>Registro</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                           <!--  <tbody id="actualizar">
						
					</tbody>-->
                            <tbody>
                            
                                <?php 
                               // require_once "./modelos/CasoModelo.php";
                               // $casos=new CasoModelo();
                                //$datos=$casos->get_casos();

                                require_once "./controladores/CasoControlador.php";
                                $casos=new CasoControlador();
                                $datos=$casos->Listar_casos_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                foreach($datos as $row){ 
                                    ?>
                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['CASnombre']?></td> 
                                <td><?php echo $row['CASdescripcion']?></td> 
                                <td><?php echo $row['CASfecha']?></td> 
                                
                                <td><?php if($row['CASestado']=="1")
                                { ?>
                                     <span class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Activo"; ?></span>
                                    <?php
                                    
                                }else{
                                    ?>  <span class="badge bg-danger" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Inactivo"; ?></span>
                                    <?php
                                }
                                 ?></td> 
                               

                                <td>

                                                 
                                <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/CasoAjax.php" method="POST" data-form="delete" novalidate>

                                <a href="<?php echo SERVERURL?>ver-caso/<?php echo $row['CAScodigo']; ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                                </a>

                                <a href="<?php echo SERVERURL?>editar-caso/<?php echo $row['CAScodigo']; ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                                </a>


                                <input type="hidden" name="caso_codigo_del" value="<?php echo $row['CAScodigo']; ?>" />    
                                <button type="submit" class="btn btn-round btn-outline-danger btn-sm">
                                        <i class="fa fa-trash-o fa-sm"></i> 

                                </button>
                                </input>


                            </form> 

                                        
                                               
                                                
                                 </td>
                                </tr>
                                <?php }  ?>

                                
                               
                            </tbody>
                        </table>
                    </div>
                                           


                                        </div>
                                     </div>
                                </div> 


                            </div>
                        </div>
                    </div>
        </div>
 </div>


 <div class="modal fade" id="ver-pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="x_panel">
		<div class="x_title">
			<h2 class="text-center">Reporte Generado</h2>
			<div class="clearfix"></div>
		</div>

		 <div id="view_pdf"></div>
			<a id="cancel" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</a>
		</div>
	</div>
</div>
	
<script type="text/javascript">
(function(){	
	$('#rango_fecha').on('click',function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../dao/busca_por_fecha.php';
		$.ajax({
		type:'POST', 
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#actualizar').html(datos);
		}
	});
	return false;
	});
})();
	
function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	var url = '../dao/exportar_pdf.php';
	$('.cargando').removeClass('hide');
	$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('.cargando').addClass('hide');
			$('#ver-pdf').modal({
				show:true,
				backdrop:'static'
			});	
			PDFObject.embed("../temp/reporte.pdf", "#view_pdf");
		}
	});
	return false;
}


</script>
 
