<?php 
if($_SESSION['privilegio_spm']!=1){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left" style="color:#10226a;">
                    <h3>UPT <small>Oficina de Educación Virtual</small></h3>
                </div>




            </div>

                <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">

                                <div class="x_title" style="color:#10226a;">
                                    <h2>UPTvirtual <small>Lista Tipos de Usuarios (Emisor)</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                       
                                    </ul>                      
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        
                                        <p align="right">
                            <a href="<?php echo SERVERURL?>agregar-tipo-usuario/"  style="background-color:#fdaf17;color:white;" class="btn btn-round btn-outline btn-sm" align="left"><i class="fa fa-plus fa-sm"></i> Nuevo
                                </a></p>
                                           
                                        <div class="card-box table-responsive">
                        
                      <table id="datatable" class="table table-hover table-condensed table-bordered border-warning" style="width:100%" >
                       

                            <thead  class="thead-primary" style="background-color:#10226a;color:white;">
                                <tr>
                                <th>Registro</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
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

                                require_once "./controladores/TipoUsuarioControlador.php";
                                $casos=new TipoUsuarioControlador();
                                $datos=$casos->Listar_tipousuario_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                foreach($datos as $row){ 
                                    ?>
                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['TIUnombre']?></td> 
                                <td><?php echo $row['TIUdescripcion']?></td> 
                                <td><?php echo $row['TIUfecha']?></td> 
                                <td><?php if($row['TIUestado']=="1")
                                { ?>
                                     <span class="badge bg-success" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Activo"; ?></span>
                                    <?php
                                    
                                }else{
                                    ?>  <span class="badge bg-danger" style="background-color:#10226a;color:white;"><?php echo $nuevoestado = "Inactivo"; ?></span>
                                    <?php
                                }
                                 ?></td> 
                               

                                    <td>
                                    
                                        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/TipoUsuarioAjax.php" method="POST" data-form="delete" novalidate> 
                                        
                                        <?php
                                require_once "modelos/modeloPrincipal.php";
                            $principal= new modeloPrincipal();
                            ?>
                                         <a href="<?php echo SERVERURL?>ver-tipo-usuario/<?php echo $principal->encryption($row['TIUcodigo']) ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                                        </a>

                                        <a href="<?php echo SERVERURL?>editar-tipo-usuario/<?php echo $principal->encryption($row['TIUcodigo']) ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                                        </a>
                                    
                                        <input type="hidden" name="tipousuario_codigo_del" value="<?php echo $row['TIUcodigo']; ?>" />    
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

 
