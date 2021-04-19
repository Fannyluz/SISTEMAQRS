<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
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
          <div class="">
   
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Información detallada de la actividad pendiente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"><b>Destinatario al personal <?php echo $campos['PEUnombres']?> <?php echo $campos['PEUapellidos']?></b></h3>

                      <div class="">
                      	<h6>
                      	 <p><strong>Tipo: </strong> <?php echo $campos['TIPnombre']?></p>
                          <p><strong>Caso: </strong><?php echo $campos['CASnombre']?></p></h6>
                        <div class="product_price">
                        	<h6>
                        	<p><strong><u>Datos del Emisor: </u> </strong> <?php echo $campos['TIUnombre']?> </strong></p>

                          <p><strong>Codigo: </strong> <?php echo $campos['ACTcodigoUPT']?></p>
                          <p><strong>Facultad:</strong> </p> <?php if($campos['ACTfacultad']=="0")
                                {
                                    ?> <h5> <label class="badge bg-warning" style="background-color:#9A6B;color:black;"><?php echo "Sin Facultad"; ?></label></h5>
                                    <?php
                                }
                                else if($campos['ACTfacultad']=="1")
                                {
                                     ?> <h5> <label class="badge bg-primary" style="background-color:#9A6B;color:gray;"><?php echo $nuevoestado = "FAING"; ?></label></h5>
                                    <?php
                                }
                                else if($campos['ACTfacultad']=="2")
                                {
                                     ?> <h5> <label class="badge bg-primary" style="background-color:#9A6B;color:yellow;"><?php echo $nuevoestado = "FAEDCOH"; ?></label></h5>
                                    <?php
                                }else if($campos['ACTfacultad']=="3")
                                {
                                     ?> <h5> <label class="badge bg-secondary" style="background-color:#9A6B;color:blue;"><?php echo $nuevoestado = "FADE"; ?></label></h5>
                                    <?php
                                }else if($campos['ACTfacultad']=="4") 
                                {
                                     ?> <h5> <label class="badge bg-info" style="background-color:#9A6B;color:purple;"><?php echo $nuevoestado = "FACSA"; ?></label></h5>
                                    <?php
                                }else if($campos['ACTfacultad']=="5")
                                {
                                     ?> <h5> <label class="badge bg-light" style="background-color:#9A6B;color:green;"><?php echo $nuevoestado = "FACEM"; ?></label></h5>
                                    <?php
                                }
                                else{
                                     ?> <h5> <label class="badge bg-danger" style="background-color:#9A6B;color:orange;"><?php echo $nuevoestado = "FAU"; ?></label></h5>
                                    <?php
                                }
                                 ?> </strong> </P>
                         <h6> <p><strong>Nombres: </strong><?php echo $campos['ACTnombres']?></p></h6>
                         <h6> <p><strong>Apellidos: </strong><?php echo $campos['ACTapellidos']?></p></h6>
                         <h6> <p><strong>Descripción: </strong> <?php echo $campos['ACTDescripcion']?></p></h6>
                          <ul class="list-unstyled">

                                          <h6> <p><strong>Correo: </strong><li><i class="fa fa-envelope"></i> <?php echo $campos['ACTcorreoelectronico']?></li></h6>
                                          <br>
                                          <h6> <p><strong>Celular: </strong><li><i class="fa fa-phone"></i> <?php echo $campos['ACTcelular']?></li></h6>
                                </ul>
</h6>

<h6> <p><strong>Estado: </strong> <?php if($campos['ACTestado']=="10")
                                {
                                    ?> <h5> <label class="badge bg-warning" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Pendiente"; ?></label></h5>
                                    <?php
                                }else if($campos['ACTestado']=="20")
                                {
                                     ?> <h5> <label class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Atendido"; ?></label></h5>
                                    <?php
                                }
                                else{
                                     ?> <h5> <label class="badge bg-danger" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Rechazado"; ?></label></h5>
                                    <?php
                                }
                                 ?>

                          <h6><strong>Fecha:</strong><?php echo $campos['CASfecha']?></h6>

                          <h6> <p><strong>Acciones: </strong> <?php echo $campos['ACTacciones']?></p></h6>
                          <br>
                        </div>
                      </div>

                      <div class="product_social">
                        <ul class="list-inline display-layout">
                          
                          <a href="<?php echo SERVERURL?>listar-actividadQrsAll/" class="btn btn-round btn-danger btn-sm"><i class="fa fa-mail-reply fa-sm"></i> Atras
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
   
