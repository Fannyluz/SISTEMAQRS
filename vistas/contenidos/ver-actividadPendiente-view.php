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
$datos_caso= $ins_caso->Ver_ActividadesQrsPendientes_controlador($pagina[1]);
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

                      <h3 class="prod_title"><b>Dirigido a:</b> <?php echo $campos['PEUnombres']?> <?php echo $campos['PEUapellidos']?> - <?php echo $campos['ROPnombre']?></h3>

                      <div class="">
                      	<h6>
                      	 <p><strong>Tipo: </strong> <?php echo $campos['TIPnombre']?></p>
                          <p><strong>Caso: </strong><?php echo $campos['CASnombre']?></p></h6>
                        <div class="product_price">
                        	<h6>
                        	<p><strong><u>Datos del Emisor: </u></strong></p>

                          <p><strong>Codigo: </strong> <?php echo $campos['ACTcodigoUPT']?></p>
                          <p><strong>Nombres: </strong><?php echo $campos['ACTnombres']?></p>
                           <p><strong>Apellidos: </strong><?php echo $campos['ACTapellidos']?></p>
                           <p><strong>Descripción: </strong> <?php echo $campos['ACTDescripcion']?></p>
                          <ul class="list-unstyled">

                                          <li><i class="fa fa-envelope"></i> <?php echo $campos['ACTcorreoelectronico']?></li>
                                          <br>
                                          <li><i class="fa fa-phone"></i> <?php echo $campos['ACTcelular']?></li>
                                </ul>
</h6>

                          <?php if($campos['ACTestado']=="1")
                                {
                                    ?> <h5> <label class="badge bg-warning" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Pendiente"; ?></label></h5>
                                    <?php
                                }else if($campos['ACTestado']=="2")
                                {
                                     ?> <h5> <label class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Atendido"; ?></label></h5>
                                    <?php
                                }
                                else{
                                     ?> <h5> <label class="badge bg-danger" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Rechazado"; ?></label></h5>
                                    <?php
                                }
                                 ?>

                          <h6><?php echo $campos['CASfecha']?></h6>
                          <br>
                        </div>
                      </div>

                      <div class="product_social">
                        <ul class="list-inline display-layout">
                          
                          <a href="<?php echo SERVERURL?>listar-actividadPendiente/" class="btn btn-round btn-danger btn-sm"><i class="fa fa-mail-reply fa-sm"></i> Atras
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
   
