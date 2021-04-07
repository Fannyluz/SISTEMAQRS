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


     <div class="">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  
                  <div class="x_content"> 

                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" > 
                         <i class="fa fa-user fa-sm"></i> Docente
                     </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" >
                            <i class="fa fa-graduation-cap fa-sm"></i> Estudiante
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" >
                            <i class="fa fa-users fa-sm"></i> Administrativo
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="otros-tab" data-toggle="tab" href="#otros" role="tab" aria-controls="otros" aria-selected="false" >
                            <i class="fa fa-users fa-sm"></i> Otros
                        </a>
                      </li>
                    </ul>
                    

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        

<form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST" data-form="save" novalidate>
                                                            
                     </p>
                     <span class="section">QRS que atiende la Oficina de Educación Virtual - DOCENTE</span>

                 <?php 
                    require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                    $tipoqrs=new UsuarioPersonalUptVirtualControlador();
                    $datosTipoQRS=$tipoqrs->Listar_usuariopersonaluptvirtual_estado_controlador();
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
$datosTipoQRS=$tipoqrs->Listar_tipoqrs_estado_controlador();
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
                                                    $datosCaso=$caso->Listar_casos_estado_controlador(); 
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
                                                    $datosUsuario=$tipoUsuario->Listar_tipousuario_estado_controlador();
                                                    $count=1;
                                                    $nuevoestado="Activo";
                                                    ?>
                                                    
                                                    

                                                    <div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo Emisor:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" name="tipousuario_reg">
<?php 

foreach($datosUsuario as $row){ 
if($row['TIUcodigo']=="2")
{
    ?>
    <option value=<?php echo $row['TIUcodigo']?>><?php echo $row['TIUnombre']?></option>
    <?php
}
    ?>
}

<?php }?>
</select>
</div>
</div>


                                                   


<div class="field item form-group">
     <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Codigo Universitario:</b><span class="required"></span></label>
    <div class="col-md-6 col-sm-6">
         <input pattern="[0-9-]{0,20}" data-validate-length-range="3" class="form-control" name="codigo_reg" id="usuario" maxlength="10" required="required" placeholder="Ingrese el codigo" />
     </div>
</div>
<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Facultad:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" name="ACTfacultad_reg">
<option value="0" selected="">Seleccione</option>
<option value="1">FAING</option>
<option value="2">FAEDCOH</option>
<option value="3">FADE</option>
<option value="4">FACSA</option>
<option value="5">FACEM</option>
<option value="6">FAU</option>
</select>
</div>
</div>

                                                            
<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" name="ACTnombres_reg" id="clave" placeholder="Ingrese el nombre" required="required" />
</div>
</div>


<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" name="ACTapellidos_reg" id="clave" placeholder="Ingrese el apellido" required="required" />
</div>
</div>


<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Descripción:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<textarea class="form-control" name="ACTdescripcion_reg" id="clave" placeholder="Ingrese la descripción" required="required"></textarea>
</div>
</div>


<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" name="ACTcelular_reg" id="clave" placeholder="Ingrese el celular" maxlength="9" required="required" />
</div>
</div>


<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required"></span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" name="ACTcorreoElectronico_reg" class='email' id="usuario" required="required" type="email" placeholder="Ingrese el correo" />
</div>
</div>


                                                        
<?php $fcha = date("Y-m-d");?>
<div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<input class="form-control" class='date' type="date" name="ACTfecha_reg" value="<?php echo $fcha;?>" required='required'></div>
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
<a href="<?php echo SERVERURL?>listar-actividadQrsAll/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
</a>
<button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;">Guardar</button>
<button type="reset" class="btn btn-round" style="background-color:#fdaf17;color:white;">Limpiar</button>
</div>
</div>
</div>


</form>

                      </div>

<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST" data-form="save" novalidate>
                                                            
                                                            </p>
                                                            <span class="section">QRS que atiende la Oficina de Educación Virtual - ESTUDIANTE</span>
                        
                        
                                                                            <?php 
                                                                            require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                                                            $tipoqrs=new UsuarioPersonalUptVirtualControlador();
                                                                            $datosTipoQRS=$tipoqrs->Listar_usuariopersonaluptvirtual_estado_controlador();
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
                                                                            $datosTipoQRS=$tipoqrs->Listar_tipoqrs_estado_controlador();
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
                                                                            $datosCaso=$caso->Listar_casos_estado_controlador(); 
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
                                                                            $datosUsuario=$tipoUsuario->Listar_tipousuario_estado_controlador();
                                                                            $count=1;
                                                                            $nuevoestado="Activo";
                                                                            ?>
                        
                        <div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo Emisor:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" name="tipousuario_reg">
<?php 

foreach($datosUsuario as $row){ 
if($row['TIUcodigo']=="1")
{
    ?>
    <option value=<?php echo $row['TIUcodigo']?>><?php echo $row['TIUnombre']?></option>
    <?php
}
    ?>
}

<?php }?>
</select>
</div>
</div>
                        
                        
                                                                                    <div class="field item form-group">
                                                                                       <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Codigo Universitario:</b><span class="required"></span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" pattern="[0-9-]{0,20}" maxlength="10" required="required" name="codigo_reg" id="usuario" placeholder="Ingrese el codigo" />
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" name="ACTnombres_reg" id="clave" placeholder="Ingrese el nombre" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                     <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" name="ACTapellidos_reg" id="clave" placeholder="Ingrese el apellido" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Descripción:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <textarea class="form-control" name="ACTdescripcion_reg" id="clave" placeholder="Ingrese la descripción" required="required"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" data-validate-length-range="3" maxlength="9" required="required" name="ACTcelular_reg" id="clave" placeholder="Ingrese el celular" maxlength="9" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                       <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required"></span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" class='email' required="required" type="email" name="ACTcorreoElectronico_reg" id="usuario" placeholder="Ingrese el correo" />
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <?php $fcha = date("Y-m-d");?>
                        
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" class='date' type="date" name="ACTfecha_reg" value="<?php echo $fcha;?>" required='required'></div>
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
                                                                                    

                                                                                    <select class="form-control" name="ACTfacultad_reg" style="visibility:hidden">
                                                                                        <option value="0" selected="">Seleccione</option>
                                                                                        <option value="1">FAING</option>
                                                                                        <option value="2">FAEDCOH</option>
                                                                                        <option value="3">FADE</option>
                                                                                        <option value="4">FACSA</option>
                                                                                        <option value="5">FACEM</option>
                                                                                        <option value="6">FAU</option> 
                                                                                    </select>

                                                                                    <div class="ln_solid">
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-6 offset-md-3">
                                                                                            <br>
                                                                                            <a href="<?php echo SERVERURL?>listar-actividadQrsAll/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                                                                                    </a>
                                                                                                <button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;">Guardar</button>
                                                                                                <button type="reset" class="btn btn-round" style="background-color:#fdaf17;color:white;">Limpiar</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST" data-form="save" novalidate>
                                                            
                                                            </p> 
                                                            <span class="section">QRS que atiende la Oficina de Educación Virtual - ADMINISTRATIVO</span>
                        
                        
                                                                            <?php 
                                                                            require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                                                            $tipoqrs=new UsuarioPersonalUptVirtualControlador();
                                                                            $datosTipoQRS=$tipoqrs->Listar_usuariopersonaluptvirtual_estado_controlador();
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
                                                                            $datosTipoQRS=$tipoqrs->Listar_tipoqrs_estado_controlador();
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
                                                                            $datosCaso=$caso->Listar_casos_estado_controlador(); 
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
                                                                            $datosUsuario=$tipoUsuario->Listar_tipousuario_estado_controlador();
                                                                            $count=1;
                                                                            $nuevoestado="Activo";
                                                                            ?>
                        
                        <div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo Emisor:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" name="tipousuario_reg">
<?php 

foreach($datosUsuario as $row){ 
if($row['TIUcodigo']=="3")
{
    ?>
    <option value=<?php echo $row['TIUcodigo']?>><?php echo $row['TIUnombre']?></option>
    <?php
}
    ?>
}

<?php }?>
</select>
</div>
</div>
                        
                        
                                                                                   
                                                                                    
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" name="ACTnombres_reg" id="clave" placeholder="Ingrese el nombre" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                     <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" name="ACTapellidos_reg" id="clave" placeholder="Ingrese el apellido" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Descripción:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <textarea class="form-control" name="ACTdescripcion_reg" id="clave" placeholder="Ingrese la descripción" required="required"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" data-validate-length-range="3" name="ACTcelular_reg" id="clave" placeholder="Ingrese el celular" maxlength="9" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                       <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required"></span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" class='email' required="required" type="email" name="ACTcorreoElectronico_reg" id="usuario" placeholder="Ingrese el correo" />
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <?php $fcha = date("Y-m-d");?>
                        
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" class='date' type="date" name="ACTfecha_reg" value="<?php echo $fcha;?>" required='required'></div>
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
                                                                                            <!-- <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Codigo Universitario (Opcional):</b><span class="required"></span></label> 
                                                                                        <div class="col-md-6 col-sm-6">-->
                                                                                        <input class="form-control" name="codigo_reg" id="usuario" placeholder="Ingrese el nombre"  style="visibility:hidden" />
                                                                                        <!--</div>
                                                                                    </div>-->

                                                                                    <select class="form-control" name="ACTfacultad_reg" style="visibility:hidden">
                                                                                        <option value="0" selected="">Seleccione</option>
                                                                                        <option value="1">FAING</option>
                                                                                        <option value="2">FAEDCOH</option>
                                                                                        <option value="3">FADE</option>
                                                                                        <option value="4">FACSA</option>
                                                                                        <option value="5">FACEM</option>
                                                                                        <option value="6">FAU</option>
                                                                                    </select>

                                                                                    <div class="ln_solid">
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-6 offset-md-3">
                                                                                            <br>
                                                                                            <a href="<?php echo SERVERURL?>listar-actividadQrsAll/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                                                                                    </a>
                                                                                                <button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;">Guardar</button>
                                                                                                <button type="reset" class="btn btn-round" style="background-color:#fdaf17;color:white;">Limpiar</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>    
                      </div>




<div class="tab-pane fade" id="otros" role="tabpanel" aria-labelledby="otros-tab">
<form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php" method="POST" data-form="save" novalidate>
                                                            
                                                            </p>
                                                            <span class="section">QRS que atiende la Oficina de Educación Virtual - OTROS</span>
                        
                        
                                                                            <?php 
                                                                            require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                                                            $tipoqrs=new UsuarioPersonalUptVirtualControlador();
                                                                            $datosTipoQRS=$tipoqrs->Listar_usuariopersonaluptvirtual_estado_controlador();
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
                                                                            $datosTipoQRS=$tipoqrs->Listar_tipoqrs_estado_controlador();
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
                                                                            $datosCaso=$caso->Listar_casos_estado_controlador(); 
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
                                                                            $datosUsuario=$tipoUsuario->Listar_tipousuario_estado_controlador();
                                                                            $count=1;
                                                                            $nuevoestado="Activo";
                                                                            ?>
                        
                        <div class="field item form-group">
<label class="col-form-label col-md-3 col-sm-3  label-align"><b>Tipo Emisor:</b><span class="required">*</span></label>
<div class="col-md-6 col-sm-6">
<select class="form-control" name="tipousuario_reg">
<?php 

foreach($datosUsuario as $row){ 
if($row['TIUcodigo']!="1" && $row['TIUcodigo']!="2" && $row['TIUcodigo']!="3")
{
    ?>
    <option value=<?php echo $row['TIUcodigo']?>><?php echo $row['TIUnombre']?></option>
    <?php
}
    ?>
}

<?php }?>
</select>
</div>
</div>
                        
                        
                                                                                    
                                                                                    
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" name="ACTnombres_reg" id="clave" placeholder="Ingrese el nombre" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                     <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" name="ACTapellidos_reg" id="clave" placeholder="Ingrese el apellido" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Descripción:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <textarea class="form-control" name="ACTdescripcion_reg" id="clave" placeholder="Ingrese la descripción" required="required"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" data-validate-length-range="3" name="ACTcelular_reg" id="clave" placeholder="Ingrese el celular" maxlength="9" required="required" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="field item form-group">
                                                                                       <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required"></span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" class='email' required="required" type="email" name="ACTcorreoElectronico_reg" id="usuario" placeholder="Ingrese el correo" />
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <?php $fcha = date("Y-m-d");?>
                        
                                                                                    <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha:</b><span class="required">*</span></label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <input class="form-control" class='date' type="date" name="ACTfecha_reg" value="<?php echo $fcha;?>" required='required'></div>
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

                                                                                    <!-- <div class="field item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Codigo Universitario (Opcional):</b><span class="required"></span></label> 
                                                                                        <div class="col-md-6 col-sm-6">-->
                                                                                        <input class="form-control" name="codigo_reg" id="usuario" placeholder="Ingrese el nombre"  style="visibility:hidden" />
                                                                                        <!--</div>
                                                                                    </div>-->

                                                                                    <select class="form-control" name="ACTfacultad_reg" style="visibility:hidden">
                                                                                        <option value="0" selected="">Seleccione</option>
                                                                                        <option value="1">FAING</option>
                                                                                        <option value="2">FAEDCOH</option>
                                                                                        <option value="3">FADE</option>
                                                                                        <option value="4">FACSA</option>
                                                                                        <option value="5">FACEM</option>
                                                                                        <option value="6">FAU</option>
                                                                                    </select>
                        
                                                                                    <div class="ln_solid">
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-6 offset-md-3">
                                                                                            <br>
                                                                                            <a href="<?php echo SERVERURL?>listar-actividadQrsAll/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                                                                                    </a>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
	include "./vistas/inc/validator.php"
	?>