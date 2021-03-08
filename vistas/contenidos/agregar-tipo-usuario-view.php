<?php 
if($_SESSION['privilegio_spm']!=1){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left" style="color:#10226a;">
                        <h3>UPT <small>Oficina de Educación Virtual</small></h3>
           
                        </div>

              
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>UPTvirtual <small>Agregar Tipo Usuario</small></h2>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                   <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/TipoUsuarioAjax.php" method="POST" data-form="save" novalidate>
                                        <span class="section">Tipos de Usuarios que atiende la Oficina de Educación Virtual</span>

                                      

                                       <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="tipousuario_nombre_reg" id="tipousuario_nombre" placeholder="Ingrese el nombre" required="required" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="tipousuario_descripcion_reg" id="tipousuario_descripcion" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">fecha<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="tipousuario_fecha_reg" required='required'></div>
                                        </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Estado<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="tipousuario_estado_reg">
                                                    <option value="1" selected="">Activo</option>
                                                     <option value="2">Inactivo</option>
                                                </select>
                                            </div>

                                        </div>

                                      
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                   <button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;">Guardar</button>
                                                    <button type="reset" class="btn btn-round" style="background-color:#fdaf17;color:white;">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
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