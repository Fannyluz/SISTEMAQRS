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
                                    <h2>UPTvirtual <small>Lista de Casos</small></h2>                      
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        

                                           
                                        <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        
                            <thead>
                                <tr>
                                <th>Item</th>
                                <th>DNI</th>
                                <th>nombres y Apellidos</th>
                                <th>usuario</th>
                                <th>Clave</th>
                                <th>Privilegio</th>
                                <th>fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                       
                                   <?php 

                                require_once "./controladores/UsuarioPersonalUptVirtualControlador.php";
                                $casos=new UsuarioPersonalUptVirtualControlador();
                                $datos=$casos->Listar_usuariopersonaluptvirtual_controlador();
                                $count=1;
                                $nuevoestado="";
                                $nuevoPrivilegio="";
                                foreach($datos as $row){ 
                                    ?>
                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['PEUDNI']?></td> 
                                <td><?php echo $row['PEUnombres']?>  <?php echo $row['PEUapellidos']?></td> 
                                <td><?php echo $row['UPUusuario']?></td> 
                                <td><?php echo $row['UPUclave']?></td> 
                                <td><?php if($row['UPUprivilegio']=="1")
                                {
                                     ?>  <span class="badge bg-primary" style="background-color:#10226a;color:white;"><?php echo $nuevoPrivilegio = "Control Total"; ?></span>
                                    <?php
                                }else if($row['UPUprivilegio']=="2")
                                {
                                    ?>  <span class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoPrivilegio = "Edición"; ?></span>
                                    <?php
                                        
                                }
                                else{
                                     ?>  <span class="badge bg-dark" style="background-color:#10226a;color:white;"><?php echo $nuevoPrivilegio = "Registrar"; ?></span>
                                    <?php
        
                                }
                                 ?></td> 

                                <td><?php echo $row['UPUfecha']?></td> 
                                <td><?php if($row['UPUestado']=="1")
                                { ?>
                                     <span class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Activo"; ?></span>
                                    <?php
                                    
                                }else{
                                    ?>  <span class="badge bg-danger" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Inactivo"; ?></span>
                                    <?php
                                }
                                 ?></td> 
                               

                                <td>
                                    
                                  

                                    <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/UsuarioPersonalUptVirtualAjax.php" method="POST" data-form="delete" novalidate> 

                                    <a href="<?php echo SERVERURL?>ver-usuariopersonal-uptvirtual/<?php echo $row['UPUcodigo']; ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                                        </a>

                                    <a href="<?php echo SERVERURL?>ver-usuariopersonal-uptvirtual/<?php echo $row['UPUcodigo']; ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                                    </a>

                                        <input type="hidden" name="usuariopersonaluptvirtual_codigo_del" value="<?php echo $row['UPUcodigo']; ?>" />    
                                            <button type="submit" class="btn btn-round btn-outline-danger btn-sm">
                                            <i class="fa fa-trash-o fa-sm"></i> 

                                            </button>
                                            </input>
                                        </form> 
                                </td>
                                </tr>
                                <?php }  ?>

                                
                               
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

 
