<?php 
if($_SESSION['privilegio_spm']!=3){
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
                                        
<div class="col-sm-12">

<div class="col-sm-7">
<div class="col-sm-2">
    <form method="post" action="<?php echo SERVERURL; ?>ajax/excelAjax.php">
     <input type="hidden" name="exportarExcelActividadesPendientes" value="<?php echo $_SESSION['CodUsuarioPersonalUptVirtual_spm']?>" />    
       <button type="submit" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
         <i class="fa fa-download fa-sm"></i> Excel

        </button>
      </input>

    </form> 
</div>
<div class="col-sm-2">
     <!-- Boton de pdf-->
  <form method="post" action="<?php echo SERVERURL; ?>ajax/pdfAjax.php">
     <input type="hidden" name="exportarPdfActividadesPendientes" value="<?php echo $_SESSION['CodUsuarioPersonalUptVirtual_spm']?>" />        
       <button type="submit"  class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
       <i class="fa fa-download fa-sm"></i> PDF
        </button>
          
      </input>
      
    </form> 
</div>
<div class="col-sm-2">
     <form method="post" action="<?php echo SERVERURL; ?>ajax/wordAjax.php">
     <input type="hidden" name="exportarActividadesPendientes" value="<?php echo $_SESSION['CodUsuarioPersonalUptVirtual_spm']?>" />    
         <button type="submit" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
        <i class="fa fa-download fa-sm"></i>Word
        </button>
      </input>
      
    </form> 
</div>
<div class="col-sm-3">
    <form>
    <input type="hidden" name="export" value="export" />    
      
        <a href="<?php echo SERVERURL?>graficosPendientesU/" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
          <i class="fa fa-pie-chart fa-sm"></i>Reportes
        </a>
     
      
    </form>
</div>
</div>
</div>

    

   

   
      
                                        <p align="right">
                            <a href="<?php echo SERVERURL?>agregar-actividadQRS/"  style="background-color:#fdaf17;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-plus fa-sm"></i> Nuevo
                                </a></p>

                                        <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-hover table-condensed table-bordered border-warning" style="width:100%" >
                       

                            <thead  class="thead-primary" style="background-color:#10226a;color:white;">
                                <tr>
                                <th>Nº</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                
                                <th>Personal UptVirtual (Destinatario)</th>
                                
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php 
                                require_once "./controladores/ActividadQrsControlador.php";
                                $casos=new ActividadQrsControlador();
                                $datos=$casos->listar_ActividadQrsPendientes_controlador();
                                $count=1;
                                $nuevoestado="Activo";
foreach($datos as $row){  

?>

                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['TIPnombre']?></td> 
                                <td><?php echo $row['CASnombre']?></td> 
                                 
                                <td><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?></td> 
                                
                                <td><?php echo $row['ACTnombres']?> <?php echo $row['ACTapellidos']?> (<?php echo $row['TIUnombre']?>)</td>
                                <td><?php echo $row['ACTDescripcion']?></td> 
                                <td><?php echo $row['ACTcelular']?></td>
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

                                <?php
require_once "modelos/modeloPrincipal.php";
  $principal= new modeloPrincipal();
  
?>
                                <a href="<?php echo SERVERURL?>ver-actividadPendiente/<?php echo $principal->encryption($row['ACTcodigo']) ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                                </a>

                                <a href="<?php echo SERVERURL?>editar-actividadPendiente/<?php echo $principal->encryption($row['ACTcodigo']) ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                                </a>             
                                <a href="<?php echo SERVERURL?>recepcion-actividad/<?php echo $principal->encryption($row['ACTcodigo']) ?>" class="btn btn-round btn-outline-success btn-sm"><i class="fa fa-info fa-sm"></i>
                                Recepcion</a>                 
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

 
