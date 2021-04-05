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
                                    <h2>UPTvirtual <small>Lista de Personal</small></h2>                      
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        
            <div class="col-sm-12">
                        <div id="datatable_length">
                            
                               

                            <p align="right">
                            <a href="<?php echo SERVERURL?>agregar-personal/"  style="background-color:#fdaf17;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-plus fa-sm"></i> Nuevo
                                </a></p>
                        </div>
                    </div>

                                           
                                        <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-hover table-condensed table-bordered border-warning" style="width:100%" >
                       

                            <thead  class="thead-primary" style="background-color:#10226a;color:white;">
                                <tr>
                                <th>N°</th>
                                <th>Rol</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo Electronico</th>
                                <th>Celular</th>
                                <th>Direccion</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php 
                               // require_once "./modelos/CasoModelo.php";
                               // $casos=new CasoModelo();
                                //$datos=$casos->get_casos();

                                require_once "./controladores/PersonalControlador.php";
                                $casos=new PersonalControlador();
                                $datos=$casos->Listar_personal_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                foreach($datos as $row){ 
                                    ?>
                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['ROPnombre']?></td> 
                                <td><?php echo $row['PEUDNI']?></td>
                                <td><?php echo $row['PEUnombres']?></td> 
                                <td><?php echo $row['PEUapellidos']?></td>
                                <td><?php echo $row['PEUcorreoElectronico']?></td>
                                <td><?php echo $row['PEUcelular']?></td> 
                                <td><?php echo $row['PEUdireccion']?></td>  
                                <td><?php echo $row['PEUfecha']?></td> 
                                
                               <td><?php if($row['PEUestado']=="1")
                                { ?>
                                     <span class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Activo"; ?></span>
                                    <?php
                                    
                                }else{
                                    ?>  <span class="badge bg-danger" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Inactivo"; ?></span>
                                    <?php
                                }
                                 ?></td> 
                                


                                <td>
                                <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/PersonalAjax.php" method="POST" data-form="delete" novalidate>
                                <?php
require_once "modelos/modeloPrincipal.php";
  $principal= new modeloPrincipal();
  
?>
<a href="<?php echo SERVERURL?>ver-personal/<?php echo $principal->encryption($row['PEUcodigo']) ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
</a> 

<a href="<?php echo SERVERURL?>editar-personal/<?php echo $principal->encryption($row['PEUcodigo']) ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
</a>


<input type="hidden" name="personal_codigo_del" value="<?php echo $row['PEUcodigo']; ?>" />    
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