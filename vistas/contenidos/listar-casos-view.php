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
                                <th>Registro</th>
                                <th>Registro</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php 
                               // require_once "./modelos/CasoModelo.php";
                               // $casos=new CasoModelo();
                                //$datos=$casos->get_casos();

                                require_once "./controladores/CasoControlador.php";
                                $casos=new CasoControlador();
                                $datos=$casos->Listar_casos_controlador();
                                $count=1;
                                $nuevoestado="Activo";
                                foreach($datos as $row){ 
                                    ?>
                                <tr>
                                <td><?php echo $count++?></td> 
                                <td><?php echo $row['Nombre']?></td> 
                                <td><?php echo $row['Descripcion']?></td> 
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
                                                    <a href="#" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i> </a>
                                                    <a href="#" class="btn btn-round btn-outline-danger btn-sm"><i class="fa fa-trash-o fa-sm"></i> </a>
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

 
