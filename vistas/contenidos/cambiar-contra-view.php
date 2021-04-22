

<!--probar el script-->
<script type="text/javascript">
function mostrarPassword(){
            var cambio = document.getElementById("txtPassword");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        } 
        
        $(document).ready(function () {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
    });
    </script>
<!--fin del script-->

<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2 && $_SESSION['privilegio_spm']!=3){
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
                                <h2>UPTvirtual <small>Cambiar contraseña de usuario Personal de UPTvirtual</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>  
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

 <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/UsuarioPersonalUptVirtualAjax.php" method="POST" data-form="update" novalidate>

    <input type="hidden" name="cambiar_contra_up" value="<?php echo $pagina[1]?>">
                                        
                                 </p>
                                       


                                 <h4 class="prod_title"><b>NOMBRE DE USUARIO</b></h4>
                                    	<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b></b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" readonly="readonly" name="usuario_up" id="usuario" value="<?php echo $campos['UPUusuario']?>" placeholder="Ingrese el nombre" required="required" />
                                            </div>
                                        </div>
                                        <h4 class="prod_title"><b>CAMBIAR CONTRASEÑA</b></h4> 

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nueva Contraseña:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 input-group-append">
                                                <input ID="txtPassword" type="password" class="form-control" name="clave_up"   id="clave" placeholder="Ingrese nueva contraseña" required="required" />
                                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                            </div>
                                        </div>

                                <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Repita la Contraseña:</b><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 input-group-append">
                                                <input  type="password" class="form-control" name="repetirclave_up"  id="clave" placeholder="Repita la contraseña" required="required" />
                                                </div>
                                        </div> 

                                        <br>
                                        <div class="field item form-group" style="color:red;">
                                            <label class="col-form-label col-md-5 col-sm-5  label-align"><b>En este formulario hay campos obligatorios</b><span class="required"> !</span></label>
                                            <div class="col-md-6 col-sm-6">
                                         </div>
                                        </div>
    
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <a href="<?php echo SERVERURL?>perfil/" class="btn btn-round btn-danger"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                                        </a>
                                                    <button type="submit" class="btn btn-round" style="background-color:#10226a;color:white;"><i class="fa fa-key fa-sm"></i>Cambiar Contraseña</button>
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

