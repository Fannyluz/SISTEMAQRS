<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">


                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title" style="color:#10226a;">
                                <h2>UPTvirtual <small>Agregar Tipo Personal </small></h2>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/PersonalAjax.php" method="POST" data-form="save" novalidate>
                                        
                                        </p>
                                        <span class="section">Agregar el Rol para el Personal de la Oficina de Educación Virtual</span>


                                        <?php 

                                        require_once "./controladores/RolControlador.php";
                                        $casos=new RolControlador();
                                        $datos=$casos->Listar_rol_estado_controlador();
                                        $count=1;
                                        $nuevoestado="Activo";
                                        ?>

                                        <div class="field item form-group">
                                            <label for="" class="col-form-label col-md-3 col-sm-3  label-align">Rol Personal<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <select id="rol_nombre_reg" name="rol_nombre_reg" class="form-control" value="<?php echo $ROPcodigo; ?>" >
                                            <?php foreach($datos as $row){ ?>
                                        <option value=<?php echo $row['ROPcodigo']?>><?php echo $row['ROPnombre']?></option>
                                        <?php }?>
       
                                            </select>

                                          
                                            </div>
                                        </div>



                                        


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">DNI<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="personal_dni_reg" id="personal_dni" placeholder="Ingrese el DNI" required="required" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombres<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="personal_nombre_reg" id="personal_nombre" placeholder="Ingrese el Nombre" required="required" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellidos<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="personal_apellido_reg" id="personal_apellido" placeholder="Ingrese el apellido" required="required" />
                                            </div>
                                        </div>
                                        
                                        

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Correo Electronico<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="personal_correo_reg" id="personal_correo" placeholder="Ingrese el Correo Electronico" />
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Celular<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="personal_celular_reg" id="personal_celular" placeholder="Ingrese el Celular" required="required" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Direccion<span class="required"></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="3" name="personal_direccion_reg" id="personal_direccion" placeholder="Ingrese la Direccion"/>
                                            </div>
                                        </div>
                                       <?php $fcha = date("Y-m-d");?> 
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">fecha<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="personal_fecha_reg" value="<?php echo $fcha;?>" required='required'></div>
                                        </div>

                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Estado<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">

                                            
                                                <select class="form-control" name="personal_estado_reg">
                                                    <option value="1" selected="">Activo</option>
                                                     <option value="2">Inactivo</option>
                                                </select>
                                            </div>

                                        </div>                                      
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                <a href="<?php echo SERVERURL?>listar-personal/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
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
            <?php
	include "./vistas/inc/validator.php"
	?>