<?php 
if($_SESSION['privilegio_spm']!=1){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
            
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>UPTvirtual <small>Editar Tipo QRS</small></h2>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                	<?php 
require_once "./controladores/TipoQrsControlador.php"; 
$nuevoestado="";
$ins_caso = new TipoQrsControlador();
$datos_caso= $ins_caso->Ver_tipoqrs_controlador($pagina[1]);
if($datos_caso->rowCount()==1){
  $campos=$datos_caso->fetch();
?>

        <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/TipoQrsAjax.php" method="POST" data-form="update" novalidate>

              <input type="hidden" name="tipoQRS_codigo_up" value="<?php echo $pagina[1]?>">


                                        
                </p>
            <span class="section">QRS que atiende la Oficina de Educación Virtual</span>


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="tipoqrs_nombre_up" value="<?php echo $campos['TIPnombre']?>" id="caso_nombre" placeholder="Ingrese el nombre" required="required" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                              
                                                <textarea class="form-control" data-validate-length-range="3" name="tipoqrs_descripcion_up" value="" id="caso_descripcion" placeholder="Ingrese la descripción" required="required" ><?php echo $campos['TIPdescripcion']?></textarea>

                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">fecha<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="tipoqrs_fecha_up" value="<?php echo $campos['TIPfecha']?>" required='required'></div>
                                        </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Estado<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="tipoqrs_estado_up">
                                                    <option <?php echo $campos['TIPestado'] == 1 ? 'selected' : ''; ?> value="1">Activo</option>
                                                    <option <?php echo $campos['TIPestado'] == 2 ? 'selected' : ''; ?> value="2">Inactivo</option>
                                                </select>
                                            </div>

                                        </div>

                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                <a href="<?php echo SERVERURL?>listar-tipo-qrs/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                </a>
                                                    <button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;">Actualizar</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                
                            <?php
}
?>
                
                                
                                
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        