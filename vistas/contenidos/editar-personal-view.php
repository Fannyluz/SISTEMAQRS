<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
<?php 
require_once "./controladores/PersonalControlador.php"; 
$nuevoestado="";
$ins_caso = new PersonalControlador(); 
$datos_caso= $ins_caso->Ver_Personal_controlador($pagina[1]);
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


                <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/PersonalAjax.php" method="POST" data-form="update" enctype="multipart/form-data" novalidate>             
                
                <input type="hidden" name="personal_codigo_up" value="<?php echo $pagina[1]?>">
                </p>

                <div class="col-md-3 col-sm-3">
                          <div class="product-image">
                           <img src="<?php echo SERVERURL; ?>imagenes/<?php echo $campos['PEUfoto'] ; ?>" width="25%" height="25%" required="required">
                          </div>
                        <label><b>Foto</b><span class="required">*</span></label>

                    <div class="field item form-group">
                        <div> <!-- name="fotoantes" personal_foto_reg -->
                         <input  name="fotoantes" value="<?php echo $campos['PEUfoto']?>">

                        <input class="form-control" type="file" data-validate-length-range="3" name="personal_foto_up" id="personal_foto_up" accept="image/*"/>
                        </div>
                    </div>
                </div>
                          


                 <div class="col-md-7 col-sm-7" style="border:0px solid #e5e5e5;">      
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
                                    <select class="form-control" name="rol_nombre_up"> 
                                        <?php foreach($datosTipoQRS as $row){ ?>

                                            <option  <?php echo $row['ROPcodigo'] == $campos['ROPcodigo'] ? 'selected' : ''; ?> value="<?php echo $row['ROPcodigo']?>"><?php echo $row['ROPnombre']?></option>

                                        <?php }?>
                                    </select>
                                    </div>
                                </div>
                       
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>DNI:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6"> 
                                                <input class="form-control" name="personal_dni_up"  value="<?php echo $campos['PEUDNI']?>" id="usuario" placeholder="Ingrese el DNI" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nombres:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="personal_nombre_up"  value="<?php echo $campos['PEUnombres']?>" id="clave" placeholder="Ingrese el nombre" required="required" />
                                            </div>
                                        </div>
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Apellidos:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="personal_apellido_up" value="<?php echo $campos['PEUapellidos']?>" id="clave" placeholder="Ingrese el apellido" required="required" />
                                            </div>
                                        </div>
                                       
       

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Correo Electronico:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="personal_correo_up" class='email' type="email" value="<?php echo $campos['PEUcorreoElectronico']?>" id="clave" placeholder="Ingrese el correo" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Celular:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" maxlength="9" name="personal_celular_up" value="<?php echo $campos['PEUcelular']?>" id="usuario" placeholder="Ingrese el celular" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Direccion:</b><span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="personal_direccion_up" value="<?php echo $campos['PEUdireccion']?>" id="usuario" placeholder="Ingrese la direccion" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Fecha</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="personal_fecha_up" value="<?php echo $campos['PEUfecha']?>" required='required'></div>
                                        </div>
                                    


                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Estado</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="personal_estado_up">
                                                    <option <?php echo $campos['PEUestado'] == 1 ? 'selected' : ''; ?> value="1">Activo</option>
                                                    <option <?php echo $campos['PEUestado'] == 2 ? 'selected' : ''; ?> value="2">Inactivo</option>
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