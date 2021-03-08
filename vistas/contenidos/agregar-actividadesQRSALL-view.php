<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
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
                                <h2>UPTvirtual <small>Agregar Actividad QRS</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST" data-form="save" novalidate>
                                        
                </p>
                <span class="section">QRS que atiende la Oficina de Educación Virtual</span>


                                <?php 
                                require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                $tipoqrs=new UsuarioPersonalUptVirtualControlador();
                                $datosTipoQRS=$tipoqrs->Listar_usuariopersonaluptvirtual_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>

                            <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Personal UptVirtual:</b><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="personal_reg" >
                                        <?php foreach($datosTipoQRS as $row){ ?>
                                            <option value=<?php echo $row['UPUcodigo']?>><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?> (<?php echo $row['ROPnombre']?>)</option>
                                        <?php }?>
                                    </select>
                                    </div>
                            </div>
                                <?php 
                                require_once "./controladores/TipoQrsControlador.php";
                                $tipoqrs=new TipoQrsControlador();
                                $datosTipoQRS=$tipoqrs->Listar_tipoqrs_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>

                                <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo:</b><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="tipo_reg">
                                        <?php foreach($datosTipoQRS as $row){ ?>
                                            <option value=<?php echo $row['TIPcodigo']?>><?php echo $row['TIPnombre']?></option>
                                        <?php }?>
                                    </select>
                                    </div>
                                </div>
                                     
                                <?php 
                                require_once "./controladores/CasoControlador.php";
                                $caso=new CasoControlador();
                                $datosCaso=$caso->Listar_casos_controlador(); 
                                $count=1;
                                $nuevoestado="Activo";
                                ?>

                                <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Caso:</b><span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="caso_reg">
                                        <?php foreach($datosCaso as $row){ ?>
                                            <option value=<?php echo $row['CAScodigo']?>><?php echo $row['CASnombre']?></option>
                                        <?php }?>
                                    </select>
                                    </div> 
                                </div>

                                <?php 
                                require_once "./controladores/TipoUsuarioControlador.php";
                                $tipoUsuario=new TipoUsuarioControlador();
                                $datosUsuario=$tipoUsuario->Listar_tipousuario_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>

                                <div class="field item form-group">
                                   <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo Emisor:</b><span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="tipousuario_reg">
                                        <?php foreach($datosUsuario as $row){ ?>
                                            <option value=<?php echo $row['TIUcodigo']?>><?php echo $row['TIUnombre']?></option>
                                        <?php }?>
                                    </select>
                                    </div>
                                </div>


                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Codigo Universitario (Opcional):</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="codigo_reg" id="usuario" placeholder="Ingrese el nombre" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTnombres_reg" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTapellidos_reg" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Descripción:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTdescripcion_reg" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTcelular_reg" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTcorreoElectronico_reg" id="usuario" placeholder="Ingrese el nombre" />
                                            </div>
                                        </div>
                                    


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="ACTfecha_reg" required='required'></div>
                                        </div>


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Estado:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="ACTestado_reg">
                                                    <option value="1" selected="">Pendiente</option>
                                                     <option value="2">Atendido</option>
                                                     <option value="3">Rechazado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
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