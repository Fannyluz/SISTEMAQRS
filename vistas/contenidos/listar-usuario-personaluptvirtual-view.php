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
                                <td><?php echo $row['DNI']?></td> 
                                <td><?php echo $row['Nombres']?>  <?php echo $row['Apellidos']?></td> 
                                <td><?php echo $row['Usuario']?></td> 
                                <td><?php echo $row['Clave']?></td> 
                                <td><?php if($row['Privilegio']=="1")
                                {
                                    echo $nuevoPrivilegio = "Control Total";
                                }else if($row['Privilegio']=="2")
                                {
                                        echo $nuevoPrivilegio = "Edición";
                                }
                                else{
                                    echo $nuevoPrivilegio = "Registrar";
                                }
                                 ?></td> 

                                <td><?php echo $row['Fecha']?></td> 
                                <td><?php if($row['Estado']=="1")
                                {
                                    echo $nuevoestado = "Activo";
                                }else{
                                    echo $nuevoestado = "Inactivo";
                                }
                                 ?></td> 

                                <td>
                                    <a href="#" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> </a>
                                    <a href="<?php echo SERVERURL?>agregar-casos/<?php echo $row['CodUsuarioPersonalUptVirtual']; ?>" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-pencil fa-sm"></i> </a>
                                  

                                    <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/UsuarioPersonalUptVirtualAjax.php" method="POST" data-form="delete" novalidate> 
                                        <input type="hidden" name="usuariopersonaluptvirtual_codigo_del" value="<?php echo $row['CodUsuarioPersonalUptVirtual']; ?>" />    
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

 
