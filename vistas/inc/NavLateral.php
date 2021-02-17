<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" >
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
          
          
              <a class=" site_title left">
              <img src="<?php echo SERVERURL; ?>vistas/images/upt.jpg" width="60" height="60">
                  UPT VIRTUAL
                  </a>
            </div>

            <div class="clearfix"  ></div>
            
            <div style="background-color:#fdaf17;">
     
            <font color="#10226a">

          <align="center"><i>UNIVERSIDAD PRIVADA DE TACNA</i>
          </font>

          </div>

            <div style="background-color:#FF0000;">
<p> 

</p>
</div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo SERVERURL; ?>vistas/images/picture.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>BIENVENIDO</span>
                <h2><?php echo $_SESSION['usuario_spm']?> </h2>
              <h2><?php echo $_SESSION['estado_spm']?> </h2>
              <h2><?php echo $_SESSION['privilegio_spm']?> </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> UPTvirtual <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" <?php echo SERVERURL?>general/">General</a></li>
                      <li><a href=" <?php echo SERVERURL?>mision/"> Misión</a></li>
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
                          <li><a href=" <?php echo SERVERURL?>nombre/">Agregar Tipo Actividad QRS</a></li>
                          <li><a href=" <?php echo SERVERURL?>nombre/">Listar Tipos Actividad QRS</a></li>
                        </ul>
                      </li>
                  <?php } ?>  

                  <?php if($_SESSION['privilegio_spm']==1){ ?>
                    <li><a><i class="fa fa-users"></i> Tipo Usuario <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>agregar-tipo-usuario/">Agregar Tipo Usuario</a></li>
                        <li><a href=" <?php echo SERVERURL?>listar-tipo-usuario/">Listar Tipo Usuario</a></li>
                      </ul>
                    </li>
                  <?php } ?> 

                  <?php if($_SESSION['privilegio_spm']==1){ ?>
                    <li><a><i class="fa fa-users"></i>Rol Personal UptVirtual <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>agregar-tipo-personal/">Agregar Rol Personal UptVirtual</a></li>
  					            <li><a href=" <?php echo SERVERURL?>nombre/">Listar Rol Personal UptVirtual</a></li>
                      </ul>
                    </li>
                  <?php } ?> 

                    <li><a><i class="fa fa-user"></i> Personales UptVirtual <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <?php if($_SESSION['privilegio_spm']==1 || $_SESSION['privilegio_spm']==2){ ?>
                        <li><a href=" <?php echo SERVERURL?>nombre/">Agregar Personal UptVirtual</a></li>
                        <li><a href=" <?php echo SERVERURL?>personal-uptvirtual/">Listar Personal UptVirtual</a></li>
                        <?php } ?> 
                        <?php if($_SESSION['privilegio_spm']==3){ ?>
                         <li><a href=" <?php echo SERVERURL?>personal-uptvirtual/">Personales UptVirtual</a></li>
                          <?php } ?> 
                      </ul>
                    </li>

                    <?php if($_SESSION['privilegio_spm']==1 || $_SESSION['privilegio_spm']==2){ ?>
                    <li><a><i class="fa fa-user"></i> Usuarios UptVirtual <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>nombre/">Agregar Usuario UptVirtual</a></li>
                        <li><a href=" <?php echo SERVERURL?>nombre/">Listar Usuario UptVirtual</a></li>
                      </ul>
                    </li>
                    <?php } ?>
                  
                    <li><a><i class="fa fa-paste"></i> actividades QRS<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href=" <?php echo SERVERURL?>nombre/">Registrar Actividad QRS</a></li>
                        <li><a href=" <?php echo SERVERURL?>nombre/">Listar Actividades QRS</a></li>
                      </ul>
                   </li>  

            <li><a href=" <?php echo SERVERURL?>nombre/"><i class="fa fa-check"></i> Actividades QRS Atendidas<span class="label label-success pull-right"></a></li>
              <li><a href=" <?php echo SERVERURL?>nombre/"><i class="fa fa-book"></i> Generar PDF - QRS Atendidas<span class="label label-success pull-right"></a></li>
				  
				  <li><a><i class="fa fa-bar-chart-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" <?php echo SERVERURL?>nombre/">Agregar Usuario UptVirtual</a></li>
                      <li><a href=" <?php echo SERVERURL?>nombre/">&nbsp; Listar Usuario UptVirtual</a></li>
                  
                      
                    </ul>
				  </li>
                </ul>
              </div>  

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

      


