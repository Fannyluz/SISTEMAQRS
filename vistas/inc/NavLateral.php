<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" >
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
          
          
              <a class=" site_title left" align="center"> 
             <!--<img src="<?php echo SERVERURL; ?>vistas/images/upt.jpg" width="50" height="50" class="img-circle">-->
                  UPT VIRTUAL
                  </a>

            </div>
</br>
              </br></br>
              </br>
            <div class="clearfix"  ></div>
            
            <div style="background-color:#fdaf17;">
     
            <font color="#10226a" SIZE=2>

          <align="center"><i>UNIVERSIDAD PRIVADA DE TACNA</i>
          
          </font>

          </div>

          <div style="background-color:#034ba3s;" align="center">
          <br> 
          <font color="#edf1f5" SIZE=3>

          <?php
            echo date('h:i:s A');
            ?>
            </font>
            </div>



            <div style="background-color:#FF0000;">
<p> 

</p>
</div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo SERVERURL; ?>imagenes/<?php echo $_SESSION['imagen_spm']?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">

                <span>BIENVENIDO</span>
                 <!--
                <h2><?php echo $_SESSION['CodUsuarioPersonalUptVirtual_spm']?> </h2>
                <h2><?php echo $_SESSION['personal_spm']?> </h2>
                <h2><?php echo $_SESSION['usuario_spm']?> </h2>-->
                <h2><?php echo $_SESSION['nombres_spm']?> <?php echo $_SESSION['apellidos_spm']?></h2>
                <h2><?php echo $_SESSION['rolpersonal_spm']?> </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> UPTvirtual <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" <?php echo SERVERURL?>general/">General</a></li>
                      <li><a href=" <?php echo SERVERURL?>mision/">Nosotros</a></li>
                    </ul>
                  </li>
                  
                    <?php if($_SESSION['privilegio_spm']==1){ ?>
                      <li><a><i class="fa fa-align-justify"></i>&nbsp; Casos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href=" <?php echo SERVERURL?>agregar-casos/">Agregar Caso</a></li>
                          <li><a href=" <?php echo SERVERURL?>listar-casos/">Listar Caso</a></li>
                      </ul>
                      </li>
                     <?php } ?>  

                   <?php if($_SESSION['privilegio_spm']==1){ ?>
                      <li><a><i class="fa fa-list-alt"></i>&nbsp; Tipo Actividad QRS <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href=" <?php echo SERVERURL?>agregar-tipo-qrs/">Agregar Tipo Actividad QRS</a></li>
                          <li><a href=" <?php echo SERVERURL?>listar-tipo-qrs/">Listar Tipos Actividad QRS</a></li>
                        </ul>
                      </li>
                  <?php } ?>  

                  <?php if($_SESSION['privilegio_spm']==1){ ?>
                    <li><a><i class="fa fa-users"></i> Tipo Usuario (Emisor) <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>agregar-tipo-usuario/">Agregar Tipo Usuario(Emisor)</a></li>
                        <li><a href=" <?php echo SERVERURL?>listar-tipo-usuario/">Listar Tipo Usuario(Emisor)</a></li>
                      </ul>
                    </li>
                  <?php } ?> 

                  <?php if($_SESSION['privilegio_spm']==1){ ?>
                    <li><a><i class="fa fa-users"></i>Rol Personal UptVirtual <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>agregar-rol-personal/">Agregar Rol Personal UptVirtual</a></li>
  					            <li><a href=" <?php echo SERVERURL?>listar-rol/">Listar Rol Personal UptVirtual</a></li>
                      </ul>
                    </li>
                  <?php } ?> 


                  <?php if($_SESSION['privilegio_spm']==1 || $_SESSION['privilegio_spm']==2){ ?>
                    <li><a><i class="fa fa-user"></i> Personales UptVirtual <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      
                        <li><a href=" <?php echo SERVERURL?>agregar-personal/">Agregar Personal UptVirtual</a></li>
                        <li><a href=" <?php echo SERVERURL?>listar-personal/">Listar Personal UptVirtual</a></li>
                      </ul>
                    </li>
                  <?php } ?> 



                    <?php if($_SESSION['privilegio_spm']==1 || $_SESSION['privilegio_spm']==2){ ?>
                    <li><a><i class="fa fa-user"></i> Usuarios UptVirtual <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>agregar-usuariopersonal-uptvirtual/">Agregar Usuario UptVirtual</a></li>
                        <li><a href=" <?php echo SERVERURL?>listar-usuario-personaluptvirtual/">Listar Usuario UptVirtual</a></li>
                      </ul>
                    </li>
                    <?php } ?>

                  <?php if($_SESSION['privilegio_spm']==1 || $_SESSION['privilegio_spm']==2){ ?>
                    <li><a><i class="fa fa-paste"></i> actividades QRS<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>agregar-actividadesQRSALL/">Registrar Actividad QRS</a></li>
                        <li><a href=" <?php echo SERVERURL?>listar-actividadQrsAll/">Listar Actividades QRS</a></li>
                      </ul>
                   </li>  
                   <?php } ?>

                   <?php if($_SESSION['privilegio_spm']==3){ ?>
                   <li><a><i class="fa fa-paste"></i> actividades QRS - U<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>agregar-actividadQRS/">Registrar Actividad QRS - U</a></li>
                        <li><a href=" <?php echo SERVERURL?>listar-actividadesQRSU/">Listar Actividades QRS - U</a></li>
                      </ul>
                   </li> 
                    <?php } ?>
            
            <?php if($_SESSION['privilegio_spm']==1 || $_SESSION['privilegio_spm']==2){ ?>
            <li><a href=" <?php echo SERVERURL?>listar-actividadAtendidasAll/"><i class="fa fa-check"></i> Actividades QRS Atendidas<span class="label label-success pull-right"></a></li>
            <li><a href=" <?php echo SERVERURL?>listar-actividadPendienteAll/"><i class="fa fa-check"></i> Actividades QRS Pendientes<span class="label label-success pull-right"></a></li>
            <?php } ?>

             <?php if($_SESSION['privilegio_spm']==3){ ?>
            <li><a href=" <?php echo SERVERURL?>listar-actividadAtendidasU/"><i class="fa fa-check"></i> Actividades Atendidas - U<span class="label label-success pull-right"></a></li>
            <li><a href=" <?php echo SERVERURL?>listar-actividadPendiente/"><i class="fa fa-clock-o"></i> Actividades Pendientes-U<span class="label label-success pull-right"></a></li>
              <?php } ?>
              
            

                

                </ul>
              </div>  

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" href="https://twitter.com/uptvirtual?lang=es" data-placement="top" title="Inicio">
                <span class="fa fa-twitter" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" href="http://www.upt.edu.pe/upt/web/index.php" data-placement="top" title="Lugar">
                <span class="fa fa-building" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" href="https://web.facebook.com/UPToficial/" data-placement="top" title="Facebook">
                <span class="fa fa-facebook-official" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" href="https://www.youtube.com/channel/UCbzoMPKjgtTG7la-v5XAqbA" data-toggle="tooltip" data-placement="top" title="Youtube" href="javascript:;">
                <span class="fa fa-youtube" aria-hidden="true" ></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

      


