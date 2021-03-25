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
$datos_caso= $ins_caso->Ver_ActividadesQrsAtendidas_controlador($pagina[1]);
if($datos_caso->rowCount()==1){
  $campos=$datos_caso->fetch();
?>
            
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>UPTvirtual <small>Editar Actividad QRS</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST" data-form="update" novalidate>
                <input type="hidden" name="ActividadQRS_codigo_up" value="<?php echo $pagina[1]?>">                     
                </p>
                <span class="section">QRS que atiende la Oficina de Educación Virtual</span>


                                 <?php 
                                require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                $personal=new UsuarioPersonalUptVirtualControlador();
                                $datosPersonal=$personal->Obtener_usuariopersonaluptvirtual_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>

                            <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Personal UptVirtual:</b><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="personal_up" >
                                        <?php foreach($datosPersonal as $row){ ?>

                                            <option  <?php echo $row['UPUcodigo'] == $campos['UPUcodigo'] ? 'selected' : ''; ?> value="<?php echo $row['UPUcodigo']?>"><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?> (<?php echo $row['ROPnombre']?>) </option>

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
                                    <select class="form-control" name="tipo_up">
                                        <?php foreach($datosTipoQRS as $row){ ?>

                                           <option  <?php echo $row['TIPcodigo'] == $campos['TIPcodigo'] ? 'selected' : ''; ?> value="<?php echo $row['TIPcodigo']?>"><?php echo $row['TIPnombre']?></option>

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
                                    <select class="form-control" name="caso_up">
                                        <?php foreach($datosCaso as $row){ ?>

                                           <option  <?php echo $row['CAScodigo'] == $campos['CAScodigo'] ? 'selected' : ''; ?> value="<?php echo $row['CAScodigo']?>"><?php echo $row['CASnombre']?></option>

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
                                    <select class="form-control" name="tipousuario_up">
                                        <?php foreach($datosUsuario as $row){ ?>

                                            <option  <?php echo $row['TIUcodigo'] == $campos['TIUcodigo'] ? 'selected' : ''; ?> value="<?php echo $row['TIUcodigo']?>"><?php echo $row['TIUnombre']?></option>

                                        <?php }?>
                                    </select>
                                    </div>
                                </div>


                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Codigo Universitario (Opcional):</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="codigo_up"  value="<?php echo $campos['ACTcodigoUPT']?>" id="usuario" placeholder="Ingrese el nombre" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTnombres_up"  value="<?php echo $campos['ACTnombres']?>" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTapellidos_up" value="<?php echo $campos['ACTapellidos']?>" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Descripción:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                             <textarea class="form-control" name="ACTdescripcion_up"  value="" id="clave" placeholder="Ingrese la descripción" required="required"><?php echo $campos['ACTDescripcion']?></textarea>

                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTcelular_up" value="<?php echo $campos['ACTcelular']?>" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTcorreoElectronico_up" value="<?php echo $campos['ACTcorreoelectronico']?>" id="usuario" placeholder="Ingrese el nombre" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="ACTfecha_up" value="<?php echo $campos['ACTfecha']?>" required='required'></div>
                                        </div>
                                    


                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Estado</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="ACTestado_up">
                                                    <option <?php echo $campos['ACTestado'] == 1 ? 'selected' : ''; ?> value="1">Pendiente</option>
                                                    <option <?php echo $campos['ACTestado'] == 2 ? 'selected' : ''; ?> value="2">Atendido</option>
                                                    <option <?php echo $campos['ACTestado'] == 3 ? 'selected' : ''; ?> value="2">Rechazado</option>
                                                </select>
                                            </div>

                                        </div>

                                        <br>

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <a href="<?php echo SERVERURL?>listar-actividadAtendidasU/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
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

                <?php
}
?>
            </div>
            <?php
	include "./vistas/inc/validator.php"
	?>