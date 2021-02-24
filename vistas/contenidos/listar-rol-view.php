<div class="right_col" role="main">
        <div class="">
        

                <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">

                                <div class="x_title" style="color:#10226a;">
                                    <h2>UPTvirtual <small>Lista de Roles</small></h2>                      
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        

                                           
                                        <div class="card-box table-responsive">
                        
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        
                            <thead>
                                <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
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

                                require_once "./controladores/RolControlador.php";
                                $casos=new RolControlador();
                                $datos=$casos->Listar_rol_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                foreach($datos as $row){ 
                                    ?>
                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['ROPnombre']?></td> 
                                <td><?php echo $row['ROPdescripcion']?></td> 
                                <td><?php echo $row['ROPfecha']?></td> 
                                
                                <td><?php if($row['ROPestado']=="1")
                                {
                                    echo $nuevoestado = "Activo";
                                }else{
                                    echo $nuevoestado = "Inactivo";
                                }
                                 ?></td> 


                                <td>
                                <a href="#" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                                </a>
                                <a href="<?php echo SERVERURL?>editar-caso/<?php echo $row['CodCaso']; ?>" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                                                 </a>
                                                 
                                    <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/CasoAjax.php" method="POST" data-form="delete" novalidate>
                                        <input type="hidden" name="caso_codigo_del" value="<?php echo $row['ROPcodigo']; ?>" />    
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

 
