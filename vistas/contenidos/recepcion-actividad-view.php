<?php 
if($_SESSION['privilegio_spm']!=3){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
<?php 
require_once "./controladores/ActividadQrsControlador.php"; 
$nuevoestado="";
$ins_caso = new ActividadQrsControlador();
$datos_caso= $ins_caso->Ver_ActividadesQrs_controlador($pagina[1]);
if($datos_caso->rowCount()==1){
  $campos=$datos_caso->fetch();
?>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>UPTvirtual <small>Recepcion de Actividad QRS Pendiente</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

 <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST" data-form="update" novalidate>

<input type="hidden" name="ActividadQRS_codigo_up_info" value="<?php echo $pagina[1]?>">

                </p>
                
                <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b></b><span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                            <h3 class="prod_title"><b>Dirigido a:</b> <?php echo $campos['PEUnombres']?> <?php echo $campos['PEUapellidos']?> </h3>
                            <b>Emisor:</b> <?php echo $campos['ACTnombres']?> <?php echo $campos['ACTapellidos']?>
                <br>
                <br>
                           <p><strong>Descripción: </strong> <?php echo $campos['ACTDescripcion']?></p>     
                        </div>            
                        </div>

                                        <?php $fcha = date("Y-m-d");?>
                        
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha:</b><span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="date" name="ACTfecha_up" value="<?php echo $fcha;?>" required='required'></div>
                        </div>



                                                
                                        <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Estado:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <select class="form-control" name="ACTestado_up">
                                                                                                <option value="1" >Pendiente</option>
                                                                                                 <option value="2"selected="">Atendido</option>
                                                                                                 <option value="3">Rechazado</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                        <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Acciones:</b><span>*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="ACTacciones_up" id="ACTacciones_up" placeholder="Ingrese las acciones realizadas"></textarea>
                                        </div>
                                        </div>

                                        <div class="ln_solid"> 
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <a href="<?php echo SERVERURL?>listar-actividadPendiente/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                                        </a>
                                                    <button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;"><i class="fa fa-check fa-sm"></i>Recepcionar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                
                            
                                
                                
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


<?php
}
?>
            </div>
            <?php
	include "./vistas/inc/validator.php"
	?>