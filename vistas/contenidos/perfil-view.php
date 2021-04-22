<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2 && $_SESSION['privilegio_spm']!=3){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
<?php 
require_once "./controladores/PersonalControlador.php"; 
$nuevoestado="";
$ins_caso = new PersonalControlador(); 


$datos_caso= $ins_caso->Ver_perfil_controlador($pagina[1]);

if($datos_caso->rowCount()==1){
  
  $campos=$datos_caso->fetch();  
?>



          <div class="">
   
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Información de Perfil - Oficina de Educación Virtual</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br>
               

                  <div class="col-md-5 col-sm-5" enctype="multipart/form-data">
                      <div class="product-image">
                        <img src="<?php echo SERVERURL; ?>imagenes/<?php echo $campos['PEUfoto'] ; ?>" width="50%" height="50%">

                      </div>
                         
                    </div>


                    <div class="col-md-4 col-sm-4" style="border:0px solid #e5e5e5;">

                    <h3 class="prod_title"><b>INFORMACION PERSONAL</b></h3>
                      <h4 class="prod_title"><b><?php echo $campos['PEUnombres']?>  <?php echo $campos['PEUapellidos']?></b></h4>
                      <div class="">
                        <div class="product_price">
                          <h6>
                          
                          <p><strong>DNI: </strong> <?php echo $campos['PEUDNI']?></p>
                          <p><strong>Rol: </strong> <?php echo $campos['ROPnombre']?> </p>
                           
                          <h6><p><strong>Direccion: </strong>  <?php echo $campos['PEUdireccion']?><p></h6>
                                          
                          <h6><p><strong>Correo: </strong>  <?php echo $campos['PEUcorreoElectronico']?></p></h6>
                                          
                                          <h6><p><strong>Celular: </strong> <?php echo $campos['PEUcelular']?></p></h6>
                                        
                                        </ul>
                          
<h6><p><strong>Estado: </strong> <?php if($campos['PEUestado']=="1")
                          {

                                              ?>
                                              <h5><?php echo $nuevoestado = "Activo"?></h5>
                                              <h5>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"> </span></a>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"></span></a>
                                              </h5>
                                              <?php
                          }else{
                                              
                                              ?>
                                              <h5 class="price"><?php echo $nuevoestado = "Inactivo"?></h5>
                                               <h5>
                                              <a href="#"><span class="fa fa-star" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star" style="background-color:#fdaf17;color:white;"></span></a>
                                            </h5>
                                              <?php
                                          }
                          ?></p></h6>
                          <h6><p><strong>Fecha: </strong><span class="price-tax"><?php echo $campos['PEUfecha']?></span></p></h6>
                          <br>

                          


                        </div>
                      </div>


                    </div>
                   


<?php
                                    require_once "modelos/modeloPrincipal.php";
                                    $principal= new modeloPrincipal();
  
                                    ?>

<div class="ln_solid" align="center">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                <br>
                                                    <a href="<?php echo SERVERURL?>general/" class="btn btn-round btn-danger"><i class="fa fa-home fa-sm"></i> General
                                                        </a>
                                                    
                                                    <a href="<?php echo SERVERURL?>cambiar-contra/<?php echo $principal->encryption($campos['UPUcodigo']) ?>" class="btn btn-round  btn-sm" style="color:red;"><i class="fa fa-edit fa-sm"></i><b><u>Cambiar contraseña</u></b>
                                    </a>
                                                </div>
                                            </div>
                                        </div>





                  </div>
                </div>
              </div>
            </div>
<?php
}
?>
          </div>
        </div>

