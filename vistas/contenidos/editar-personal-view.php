<?php 
if($_SESSION['privilegio_spm']!=1 ){
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
                                <h2>UPTvirtual <small>Editar Personal</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/PersonalAjax.php" method="POST" data-form="save" novalidate>             
                </p>
                                
                                <?php 
                                require_once "./controladores/RolControlador.php";
                                $tipoqrs=new RolControlador();
                                $datosTipoQRS=$tipoqrs->Listar_rol_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>

                                <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Rol:</b><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="tipo_reg">
                                        <?php foreach($datosTipoQRS as $row){ ?>

                                            <option  <?php echo $row['ROPcodigo'] == $campos['ROPcodigo'] ? 'selected' : ''; ?> value="<?php echo $campos['ROPcodigo']?>"><?php echo $row['ROPnombre']?></option>

                                        <?php }?>
                                    </select>
                                    </div>
                                </div>
                       
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>DNI:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="codigo_reg"  value="<?php echo $campos['PEUDNI']?>" id="usuario" placeholder="Ingrese el nombre" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTnombres_reg"  value="<?php echo $campos['PEUnombres']?>" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTapellidos_reg" value="<?php echo $campos['PEUapellidos']?>" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Foto:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                             <textarea class="form-control" name="ACTdescripcion_reg"  value="" id="clave" placeholder="Ingrese la descripción" required="required"><?php echo $campos['PEUfoto']?></textarea>

                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTcelular_reg" value="<?php echo $campos['PEUcorreoElectronico']?>" id="clave" placeholder="Ingrese la descripción" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTcorreoElectronico_reg" value="<?php echo $campos['PEUcelular']?>" id="usuario" placeholder="Ingrese el nombre" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Direccion:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="ACTcorreoElectronico_reg" value="<?php echo $campos['PEUdireccion']?>" id="usuario" placeholder="Ingrese el nombre" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="caso_fecha_reg" value="<?php echo $campos['PEUfecha']?>" required='required'></div>
                                        </div>
                                    


                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Estado</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="caso_estado_reg">
                                                    <option <?php echo $campos['PEUestado'] == 1 ? 'selected' : ''; ?> value="1">Pendiente</option>
                                                    <option <?php echo $campos['PEUestado'] == 2 ? 'selected' : ''; ?> value="2">Atendido</option>
                                                    <option <?php echo $campos['PEUestado'] == 3 ? 'selected' : ''; ?> value="2">Rechazado</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <a href="<?php echo SERVERURL?>listar-personal/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
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