<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<?php 
require_once "./controladores/UsuarioPersonalUptVirtualControlador.php"; 
$nuevoestado="";
$ins_caso = new UsuarioPersonalUptVirtualControlador();
$datos_caso= $ins_caso->Ver_usuariopersonaluptvirtual_controlador($pagina[1]);
if($datos_caso->rowCount()==1){
  $campos=$datos_caso->fetch();
?>

<div class="right_col" role="main">
            
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>UPTvirtual <small>Agregar Usuario Personal de UPTvirtual</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>  
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

											<option  <?php echo $row['PEUcodigo'] == $campos['PEUcodigo'] ? 'selected' : ''; ?> value="<?php echo $campos['PEUcodigo']?>"><?php echo $row['PEUDNI']?> (<?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?>) </option>

                                        <?php }?>
                                        </select>
                                    </div>
                                </div>


                                    	<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Usuario<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="usuario_reg" id="usuario" value="<?php echo $campos['UPUusuario']?>" placeholder="Ingrese el nombre" required="required" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Clave<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="password" class="form-control" name="clave_reg"  value="<?php echo $campos['UPUclave']?>" id="clave" placeholder="Ingrese la clave" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Repita la Clave<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input  type="password" class="form-control" name="repetirclave_reg" value="<?php echo $campos['UPUclave']?>"id="clave" placeholder="Repita la clave" required="required" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">fecha<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="caso_fecha_reg" value="<?php echo $campos['UPUfecha']?>" required='required'></div>
                                        </div>



                                       <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Estado<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="caso_estado_reg">
                                                    <option <?php echo $campos['UPUestado'] == 1 ? 'selected' : ''; ?> value="1">Activo</option>
                                                    <option <?php echo $campos['UPUestado'] == 2 ? 'selected' : ''; ?> value="2">Inactivo</option>
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
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Estado<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="caso_estado_reg">
                                                    <option <?php echo $campos['UPUprivilegio'] == 1 ? 'selected' : ''; ?> value="1">Control Total</option>
                                                    <option <?php echo $campos['UPUprivilegio'] == 2 ? 'selected' : ''; ?> value="2">Registrar</option>
                                                    <option <?php echo $campos['UPUprivilegio'] == 2 ? 'selected' : ''; ?> value="2">Edición</option>
                                                </select>
                                            </div>

                                        </div>

     
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <a href="<?php echo SERVERURL?>listar-usuario-personaluptvirtual/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                                        </a>
                                                    <button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;">Actualizar</button>
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
}
?>

            <?php
	include "./vistas/inc/validator.php"
	?>