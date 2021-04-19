<?php 
if($_SESSION['privilegio_spm']!=1 && $_SESSION['privilegio_spm']!=2){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();

    //unset($_SESSION['consulta']);
}
?>
<div class="right_col" role="main">
        <div class="">
        

                <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">

                                <div class="x_title" style="color:#10226a;">
                                    <h2>UPTvirtual <small>Lista de Actividades QRS</small></h2> 
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>                     
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">



    <form method="post" action="<?php echo SERVERURL; ?>ajax/ExportarAjax.php">
<div class="col-sm-12">
    <div class="col-sm-12">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-round btn-sm" name="exportarExcelActividadAll"  value="export" style="background-color:#10226a;color:white;" >
                 <i class="fa fa-download fa-sm"></i> Excel

                </button>
        </div>

        <div class="col-sm-3">
            <button type="submit"  class="btn btn-round btn-sm" name="exportarPdfActividadesAll" style="background-color:#10226a;color:white;">
       <i class="fa fa-download fa-sm"></i> PDF
        </button>
        </div>

        <div class="col-sm-3">
            <button type="submit" class="btn btn-round btn-sm" name="export" value="export" style="background-color:#10226a;color:white;">
                 <i class="fa fa-download fa-sm"></i>Word
            </button>
        </div>

        <div class="col-sm-3">
                <a href="<?php echo SERVERURL?>graficos/" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
                  <i class="fa fa-pie-chart fa-sm"></i>Reportes
                </a>
        </div>


    </div>
</div>
</br>
</br></br>
<div  class="col-md-12 col-sm-12">
    <div class="col-md-10">
        <div class="col-sm-6">
            <?php 
                                require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                $tipoqrs=new UsuarioPersonalUptVirtualControlador();
                                $datosTipoQRS=$tipoqrs->Listar_usuariopersonaluptvirtual_estado_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>
                                <div class="col-md-12 col-sm-12" >
                                    <select class="form-control input-sm" id="buscarvivo" method="POST" name="buscarvivo" >
                                    <option value="vacia" selected="">Seleccione(Usuario)</option>    
                                    <?php foreach($datosTipoQRS as $row){ ?>
                                            
                                            <option value=<?php echo $row['UPUcodigo']?>><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?> (<?php echo $row['ROPnombre']?>)</option>
                                        <?php }?>
                                    </select>
                                    </div>

        </div>
        <div class="col-sm-4">
            <button type="button" style="background-color:#10226a;color:white;" class="btn btn-round btn-outline btn-sm" onclick="buscar_cliente()"><i class="fa fa-search fa-sm"></i> &nbsp; Buscar </button>
        </div>
    </div>
   
</div>  

    </form>



</br>
</br>

    
    
    
                                
                                </br>
                                <div   class="col-md-10 col-sm-10">
                                                           <div class="col-md-3 col-sm-3">
      

                        </div>       

                        </div>

   
                                       <p align="right" class="x_title">
                            <a href="<?php echo SERVERURL?>agregar-actividadesQRSALL/"  style="background-color:#fdaf17;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-plus fa-sm"></i> Nuevo
                                </a></p>


                    <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-hover table-condensed table-bordered border-warning" style="width:100%" >
                       

                            <thead  class="thead-primary" style="background-color:#10226a;color:white;">
                                <tr>
                                <th>Nº</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                               
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
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
                                $datos=$casos->listar_ActividadQrsAll_controlador(); 
                                $count=1;
                                $nuevoestado="Activo";
foreach($datos as $row){  

?>

                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['TIPnombre']?></td> 
                                <td><?php echo $row['CASnombre']?></td> 
                                 
                                <td><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?></td> 
                                <td><?php echo $row['ACTcodigoUPT'] ?></td> 
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
                                <a href="<?php echo SERVERURL?>ver-actividadAll/<?php echo $principal->encryption($row['ACTcodigo']) ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                                </a>
                                <a href="<?php echo SERVERURL?>editar-actividadAll/<?php echo $principal->encryption($row['ACTcodigo']) ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
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
 <?php include_once "./vistas/inc/reservation.php"; ?>
 <!-- probar -->
