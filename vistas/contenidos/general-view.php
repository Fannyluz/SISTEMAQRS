

<div class="right_col" role="main">
   <div class="">

                    <div class="page-title">
                        <div class="title_left" style="color:#10226a;">
                        <h3>UPT <small>Oficina de Educación Virtual</small></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">

                                <div class="x_title" style="color:#10226a;">
                                <h2>General</h2>
                                    <div class="clearfix"></div>
                                      <div style="text-align: center;">
                                    <img src="<?php echo SERVERURL; ?>vistas/images/upt.jpg" alt="" width="20%" height="20%">
                                        </div>

                                          <p style="text-align: justify;">
                                          En estos tiempos de pandemia donde estamos viviendo con distanciamiento social,
                                          confinamiento y las restricciones impuestas como medidas de prevención, nos ha
                                          hecho dar un salto hacia adelante en el uso de las TICs y nos está llevando a empujones
                                          hacia la transformación digital y la no presencialidad. En este contexto el termino aula
                                          virtual es cada vez más usado en el vocabulario de todas las personas que están
                                          estudiando o formándose como futuros profesionales.
                                          <br>
                                          <br>
                                          Un aula virtual es un entorno digital en el que se puede llevar a cabo un proceso de
                                          intercambio de conocimientos que tiene por objetivo posibilitar un aprendizaje entre
                                          los usuarios que participan en el aula. En otras palabras, un aula virtual es un espacio
                                          dentro de una plataforma online en la que comparten contenidos docentes y
                                          estudiantes, y en el que se atienden consultas, dudas y evaluaciones de los
                                          participantes. Una característica que la diferencia de las aulas tradicionales es que
                                          el aula virtual no tiene límites físicos ni temporales, el estudiante puede acceder a ella
                                          cuando quiera para tomar sus clases, sin tener que estar sujeto a horarios ni a
                                          desplazamientos físicos.
                                          <br>
                                          <br>
                                          La Universidad, para poder seguir formando profesionales en las actuales
                                          circunstancias, debe disponer de un LMS (sistema de gestión de aprendizaje) y de
                                          docentes capacitados en el manejo de herramientas tecnológicas para dar soporte al
                                          proceso de enseñanza-aprendizaje de los estudiantes de pregrado y postgrado.
                                </div>


<h3><b><u>Personales de la Oficina de Educación Virtual</u></b></h3>
<br>
<br>
                           <div class="clearfix"></div>

                            <?php 

                            require_once "./controladores/PersonalControlador.php";
                                $casos=new PersonalControlador();
                                $datos=$casos->Listar_personal_controlador();
                                $count=1;
                                $nuevoestado="";
                            foreach($datos as $row){ 
                                    ?>

                                <div class="col-md-4 col-sm-4  profile_details">
                                  
                                  <div class="well profile_view" >
                                   
                                    <div class="col-sm-12">
                                      <h4 class="brief" style="background-color:#fdaf17;"></i></h4>
                                      <div class="left col-md-7 col-sm-7" >
                                        <h2><?php echo $row['PEUnombres']?> <?php echo $row['PEUapellidos']?></h2>
                                        <p><strong>Rol: </strong> <?php echo $row['ROPnombre']?> </p>
                                        <ul class="list-unstyled">
                                          <li><i class="fa fa-building"></i> <?php echo $row['PEUdireccion']?></li>
                                          <li><i class="fa fa-envelope"></i> <?php echo $row['PEUcorreoElectronico']?></li>
                                          <li><i class="fa fa-phone"></i> <?php echo $row['PEUcelular']?></li>
                                        </ul>
                                      </div> 
                                      <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="<?php echo SERVERURL; ?>vistas/images/nuevo.png" alt="" class="img-circle img-fluid">
                                      </div>
                                    </div>
                                    <div class=" profile-bottom text-center">
                                      <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                          <a><?php if($row['PEUestado']=="1")
                                          {
                                              echo $nuevoestado = "Activo";
                                              ?>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;" </span></a>
                                              <a href="#"><span class="fa fa-star-o" style="background-color:#fdaf17;color:white;"></span></a>
                                              <?php
                                          }else{
                                              echo $nuevoestado = "Inactivo";
                                              ?>
                                              <a href="#"><span class="fa fa-star" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star" style="background-color:#fdaf17;color:white;"></span></a>
                                              <a href="#"><span class="fa fa-star" style="background-color:#fdaf17;color:white;"></span></a>
                                              <?php
                                          }
                                           ?>
                                   
                                 </a>
                                        </p>
                                      </div>
                                      <div class=" col-sm-6 emphasis">
                                        
                                        
                                        <a href="<?php echo SERVERURL?>ver-usuariopersonal-uptvirtual/<?php echo $row['PEUcodigo']; ?>" class="btn btn-round btn-outline btn-sm" style="background-color:#fdaf17;color:white;"><i class="fa fa-eye fa-sm"></i> Ver
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                  <?php }  ?>



                            </div>
                        </div>
                    </div>
    </div>




            
            <?php
	include "./vistas/inc/validator.php"
	?>