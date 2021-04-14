<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>

?>
<div class="right_col" role="main">
<?php 
require_once "./controladores/PersonalControlador.php"; 
$nuevoestado="";
$ins_caso = new PersonalControlador();
//$users = mysqli_fetch_all($ins_caso, MYSQLI_ASSOC);
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
                    <h2>Información detallada del personal</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
			            
                    <div class="col-md-3 col-sm-3">
                      <div class="product-image">
                       <img src="<?php echo SERVERURL; ?>imagenes/<?php echo $campos['PEUfoto'] ; ?>" width="25%" height="25%">
                        
                      </div>
                     
                    </div>

                    <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"><b><?php echo $campos['ROPnombre']?></b></h3>

                      <div class="">
                        <div class="product_price">
                          <h6>
                        
                          <h6>
                         <p><strong>DNI: </strong> <?php echo $campos['PEUDNI']?></p></h6>
                         <h6>
                         <p><strong>Nombres: </strong> <?php echo $campos['PEUnombres']?></p></h6>
                         <h6>
                         <p><strong>Apellidos: </strong> <?php echo $campos['PEUapellidos']?></p></h6>
                         <h6>
                         <p><strong>Correo Electronico: </strong> <?php echo $campos['PEUcorreoElectronico']?></p></h6>
                         <h6><p><strong>Celular: </strong> <?php echo $campos['PEUcelular']?></p></h6>
                         <h6><p><strong>Direccion: </strong> <?php echo $campos['PEUdireccion']?></p></h6>
                         <br>
                        <h6><p><strong>Fecha: </strong><?php echo $campos['PEUfecha']?></p></h6>
                          <br>
                          <br>
                          <?php if($campos['PEUestado']=="1")
                          {

                                              ?>
                                              <h5><?php echo $nuevoestado = "Activo"?></h5>
                                              <h5>
                                              
                                               <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"></span></a>
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
   