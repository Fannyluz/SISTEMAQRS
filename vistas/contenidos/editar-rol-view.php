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
                                <h2>UPTvirtual <small>Editar Rol</small></h2>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <?php 
require_once "./controladores/RolControlador.php"; 
$nuevoestado="";
$ins_rol = new RolControlador();
$datos_rol= $ins_rol->Ver_rol_controlador($pagina[1]);
if($datos_rol->rowCount()==1){
  $campos=$datos_rol->fetch(); 
?>                     
          <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/RolAjax.php" method="POST" data-form="update" novalidate>
            
            <input type="hidden" name="rol_codigo_up" value="<?php echo $pagina[1]?>">
                                        
                                        </p>
                                        <span class="section">Casos que atiende la Oficina de Educación Virtual</span>


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombre:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="rol_nombre_up" value="<?php echo $campos['ROPnombre']?>" id="rop_nombre_up" placeholder="Ingrese el nombre" required="required" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Descripción:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                  <textarea class="form-control" data-validate-length-range="3" name="rol_descripcion_up" id="rol_descripcion_up" placeholder="Ingrese la descripción" required="required"><?php echo $campos['ROPdescripcion']?> </textarea>

                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="rol_fecha_up" value="<?php echo $campos['ROPfecha']?>" required='required'></div>
                                        </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Estado:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="rol_estado_up">
                                                    <option <?php echo $campos['ROPestado'] == 1 ? 'selected' : ''; ?> value="1">Activo</option>
                                                    <option <?php echo $campos['ROPestado'] == 2 ? 'selected' : ''; ?> value="2">Inactivo</option>
                                                </select>
                                            </div>

                                        </div>

                                      
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                
                                                   
                                                    <a href="<?php echo SERVERURL?>listar-rol/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
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
                                        