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
$datos_caso= $ins_caso->Ver_personal_controlador($pagina[1]);
if($datos_caso->rowCount()==1){
  $campos=$datos_caso->fetch();

?>
          <div class="">
   
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Información detallada del usuario personal de la Oficina de Educación Virtual</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 

                  <div class="col-md-3 col-sm-3">
                      <div class="product-image">
                       <img src="<?php echo SERVERURL; ?>imagenes/<?php echo $campos['PEUfoto'] ; ?>" width="50%" height="50%">
                        
                      </div>
                     
                    </div>


                    <div class="col-md-7 col-sm-7" style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"><b><?php echo $campos['PEUnombres']?>  <?php echo $campos['PEUapellidos']?></b></h3>

                      <div class="">
                        <div class="product_price">
                          <h6>
                          <p><strong>DNI: </strong> <?php echo $campos['PEUDNI']?></p>
                          <p><strong>Rol: </strong> <?php echo $campos['ROPnombre']?> </p>
                           <ul class="list-unstyled">
                                          <li><i class="fa fa-building"></i> <?php echo $campos['PEUdireccion']?></li>
                                          <br>
                                          <li><i class="fa fa-envelope"></i> <?php echo $campos['PEUcorreoElectronico']?></li>
                                          <br>
                                          <li><i class="fa fa-phone"></i> <?php echo $campos['PEUcelular']?></li>
                                        </ul>
                                        <br>

                          <?php if($campos['PEUestado']=="1")
                          {

                                              ?>
                                              <h5><?php echo $nuevoestado = "Activo"?></h5>
                                              <h5>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;" </span></a>
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
                          ?>
                          <br>

                          <span class="price-tax"><?php echo $campos['PEUfecha']?></span>
                          <br>
                        </div>
                      </div>

                      <div class="product_social">
                        <ul class="list-inline display-layout">
                          
                          <a href="<?php echo SERVERURL?>general/" class="btn btn-round btn-danger btn-sm"><i class="fa fa-mail-reply fa-sm"></i> Atras
                                </a>

                        </ul>
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
