<?php 
if($_SESSION['estado_spm']!=1){
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
                                <h2>UPTvirtual <small>Agregar Tipo QRS</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/UsuarioPersonalUptVirtualAjax.php" method="POST" data-form="save" novalidate>
                                        
                                        </p>
                                        <span class="section">QRS que atiende la Oficina de Educación Virtual</span>

                      <?php 

                                require_once "./controladores/PersonalControlador.php";
                                $casos=new PersonalControlador();
                                $datos=$casos->Listar_personal_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>

                                <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align">Personal<span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="personaluptvirtual_reg">
                            <?php foreach($datos as $row){ ?>
                                        <option value=<?php echo $row['PEUcodigo']?>><?php echo $row['PEUDNI']?> (<?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?>)</option>
                                        <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                     

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Usuario<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="usuario_reg" id="usuario" placeholder="Ingrese el nombre" required="required" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Clave<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="clave_reg" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                    


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">fecha<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="fecha_reg" required='required'></div>
                                        </div>


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Estado<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="estado_reg">
                                                    <option value="1" selected="">Activo</option>
                                                     <option value="2">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                                            <div class="col-md-6 col-sm-6">
                                            <span class="section fa fa-cogs"> Nivel de Privilegio</span>
                                            <p><span class="badge badge-primary" style="width: 6rem">Control total</span> Permisos para registrar, actualizar y eliminar</p>
                                            <p><span class="badge badge-success" style="width: 6rem">Edición</span> Permisos para registrar y actualizar</p>
                                            <p><span class="badge badge-dark">Registrar</span> Solo permisos para registrar</p>
                                            </div>
                                        
                                        </div>
                                       
                                        
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Privilegio<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="privilegio_reg">
                                                    <option value="1" selected="">Control Total</option>
                                                     <option value="2">Edición</option>
                                                     <option value="3">Registrar</option>
                                                </select>
                                            </div>
                                        </div>


                                   


                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <button type="reset" class="btn btn-success">Limpiar</button>
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