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
                                    <h2>UPTvirtual <small>Lista de Actividades QRS</small></h2> 
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>                     
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">
<div class="col-sm-12">

<div class="col-sm-7">
<div class="col-sm-2">
    <form method="post" action="<?php echo SERVERURL; ?>ajax/excelAjax.php">
     <input type="hidden" name="exportarExcelActividadAll" value="export" />    
       <button type="submit" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
        Exportar Excel

        </button>
          
      </input>

        <!-- para poder tapar-->
    </form> 
</div>
<div class="col-sm-2">
       <!-- Boton de pdf-->
  <form method="post" action="<?php echo SERVERURL; ?>ajax/pdfAjax.php">
     <input type="hidden" name="exportarPdfActividadesAll" value="<?php echo $_SESSION['CodUsuarioPersonalUptVirtual_spm']?>" />        
       <button type="submit"  class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
       
        Exportar PDF
        </button>
          
      </input>
      
    </form>
    </div> 
<div class="col-sm-2">
    <form method="post" action="<?php echo SERVERURL; ?>ajax/wordAjax.php">
     <input type="hidden" name="export" value="export" />    
       <button type="submit" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">
        Exportar Word

        </button>
      </input>
      
    </form> 
</div>
<div class="col-sm-3">
       <!-- Boton de pdf-->
  <form>
    <input type="hidden" name="export" value="export" />    
      
        <a href="<?php echo SERVERURL?>graficospie/" class="btn btn-round btn-sm" style="background-color:#10226a;color:white;">REPORTES GRAFICOS
          
        </a>
     
      
    </form>
    </div>
</br>
</br>
</br>
    
    </div>
    
  <?php 
                                require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                $tipoqrs=new UsuarioPersonalUptVirtualControlador();
                                $datosTipoQRS=$tipoqrs->Listar_usuariopersonaluptvirtual_estado_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                ?>
                            </br>
                    <div   class="col-md-10 col-sm-10">

                           
                                    <div class="col-md-3 col-sm-3" >
                                    <select class="form-control" name="personal_reg" >
                                        <?php foreach($datosTipoQRS as $row){ ?>
                                            <option value=<?php echo $row['UPUcodigo']?>><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?> (<?php echo $row['ROPnombre']?>)</option>
                                        <?php }?>
                                    </select>
                                    </div>

                        <div class="col-md-3 col-sm-3">
                                   <p>
                            <a href="<?php echo SERVERURL?>agregar-actividadesQRSALL/"  style="background-color:#10226a;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-search fa-sm"></i> Buscar
                                </a></p>
                        </div>

                        

                           

                </div>
                
</br>
</br>
</br>
</br>
</br>
<?php 
                                                    require_once "./controladores/TipoQrsControlador.php";
                                                    $tipoqrs=new TipoQrsControlador();
                                                    $datosTipoQRS=$tipoqrs->Listar_tipoqrs_estado_controlador();
                                                    $count=1;
                                                    $nuevoestado="Activo";
                                                    ?>
        <div div class="col-md-10 col-sm-10">

                           
                                    <div  class="col-md-3 col-sm-3">
                                    <select class="form-control" name="personal_reg" >
                                        <?php foreach($datosTipoQRS as $row){ ?>
                                                                <option value=<?php echo $row['TIPcodigo']?>><?php echo $row['TIPnombre']?></option>
                                                            <?php }?>
                                    </select>
                                    </div>
                        <div class="col-md-3 col-sm-3">
                                   <p>
                            <a href="<?php echo SERVERURL?>agregar-actividadesQRSALL/"  style="background-color:#10226a;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-search fa-sm"></i> Buscar
                                </a></p>

                        </div>
                           

                </div>

                                        <div>
                                            <div class="col-md-3 col-sm-3" align="right">
                                            aaa
                                        </div>
                                        <div>

                         
                                       <p align="right" class="x_title">
                            <a href="<?php echo SERVERURL?>agregar-actividadesQRSALL/"  style="background-color:#fdaf17;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-plus fa-sm"></i> Nuevo
                                </a></p>

                                    
                    <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-bordered border-warning" style="width:100%" >
                       

                            <thead  class="thead-primary" style="background-color:#10226a;color:white;">
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
                                <td><?php echo $row['TIUnombre']?></td> 
                                <td><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?></td> 
                                <td><?php echo $row['ACTcodigoUPT'] ?></td> 
                                <td><?php echo $row['ACTnombres']?> <?php echo $row['ACTapellidos']?></td>
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

 
