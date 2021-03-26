<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
        <div class="">
        

                <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">

                                <div class="x_title" style="color:#10226a;">
                                    <h2>UPTvirtual <small>Lista de Actividades QRS Pendientes</small></h2> 
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>                     
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
  <!-- Esto es un comentario 
   <div class="field item form-group">
        <div>
              <label><b>...Desde...</b> <span class="required"></span></label>
             <input class="form-control" class='date' type="date" name="desde" id="desde"required='required'>
         </div><b> ...</b>
         <div>
              <label><b>Hasta...</b><span class="required"></span></label>
             <input class="form-control" class='date' type="date" name="hasta"id="hasta" required='required'>
         </div>
    </div>
-->

<form method="post" action="<?php echo SERVERURL; ?>ajax/excelAjax.php">

  
    

     <input type="hidden" name="exportPendientesAll" value="exportPendientesAll" />    
       <button type="submit" class="btn btn-" style="background-color:#10226a;color:white;">
        Exportar Excel </button>

      </input>
        <!--
      <a href="../vistas/pdf/pdfPendienteAll.php" type="submit" class="btn btn-" style="background-color:#10226a;color:white;">
        Exportar PDF 

        </a>-->
    </form>

    
    <form method="post" action="<?php echo SERVERURL; ?>ajax/wordAjax.php">
     <input type="hidden" name="exportPendientesAll" value="exportPendientesAll" />    
     
       <button type="submit" class="btn btn-" style="background-color:#10226a;color:white;" >
        Exportar Word

        </button> 
      </input>
      
    </form>
    
    
                             <p align="right">
                            <a href="<?php echo SERVERURL?>agregar-actividadesQRSALL/"  style="background-color:#fdaf17;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-plus fa-sm"></i> Nuevo
                                </a></p>

                                        <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        
                            <thead>
                                <tr>
                                <th>Nº</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php 
                                require_once "./controladores/ActividadQrsControlador.php";
                                $casos=new ActividadQrsControlador();
                                $datos=$casos->listar_ActividadQrsPendientesAll_controlador();
                                $count=1;
                                $nuevoestado="Activo";
foreach($datos as $row){  

?>

                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['TIPnombre']?></td> 
                                <td><?php echo $row['CASnombre']?></td> 
                                <td><?php echo $row['TIUnombre']?></td> 
                                <td><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?></td> 
                                <td><?php echo $row['ACTcodigoUPT'] ?></td> 
                                <td><?php echo $row['ACTnombres']?> <?php echo $row['ACTapellidos']?></td>
                                <td><?php echo $row['ACTDescripcion']?></td> 
                                <td><?php echo $row['ACTcelular']?></td>
                                <td><?php echo $row['ACTcorreoelectronico']?></td> 
                                <td><?php echo $row['ACTfecha']?></td>
                                
                                <td><?php if($row['ACTestado']=="1")
                                {
                                    ?>  <label class="badge bg-warning" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Pendiente"; ?></label>
                                    <?php
                                }else if($row['ACTestado']=="2")
                                {
                                     ?>  <label class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Atendido"; ?></label>
                                    <?php
                                }
                                else{
                                     ?>  <label class="badge bg-danger" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Rechazado"; ?></label>
                                    <?php
                                }
                                 ?></td> 

                                
                                <td>
                                <a href="<?php echo SERVERURL?>ver-actividadPendienteAll/<?php echo $row['ACTcodigo']; ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                                </a>

                                <a href="<?php echo SERVERURL?>editar-actividadPendienteAll/<?php echo $row['ACTcodigo']; ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                                </a>       
                                                
                                 </td>
                            </tr>
							<?php

                                    }
                                    ?>

                                
                               
                            </tbody>
                        </table>
                    </div>
                                           


                                        </div>
                                     </div>
                                </div> 


                            </div>
                        </div>
                    </div>
        </div>
 </div>

 
