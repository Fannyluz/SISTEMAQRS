  <!-- top navigation --> 
  <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars" style="color:#10226a;" ></i></a>
              </div>  
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" style="color:#10226a;">
                    <img src="<?php echo SERVERURL; ?>vistas/images/foto.jpg" alt=""> <?php echo $_SESSION['nombres_spm']?> <?php echo $_SESSION['apellidos_spm'] ?>
                    (<?php echo $_SESSION['rolpersonal_spm']?>)
                    
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;" style="color:#10226a;"> Perfil
                    <i class="fa fa-cogs"></i>
                    </a>
                    <a class="dropdown-item"  href="<?php echo SERVERURL?>cerrar/" class="btn-exit-system" >Cerrar
                    <i class="fa fa-power-off"></i>
                    </a>
                  </div>
                  
                </li>

              </ul>
            </nav>
          </div>
        </div>