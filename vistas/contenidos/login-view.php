<body class="login">
 <div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
      <form action="" method="POST" autocomplete="off" >
        <h1><i class="fa fa-home"></i>    UPT VIRTUAL</h1>
        <div>
          <input type="text" class="form-control" id="UserName" name="usuario_log" pattern="[a-zA-Z0-9]{1,35}" required="" >
        </div>

        <div>
              <input type="password" class="form-control" id="UserPassword" name="clave_log" pattern="[a-zA-Z0-9$@.-]{3,100}" required="" >
        </div>

        <button type="submit" class="btn btn-" style="background-color:#10226a;color:white;">Acceder</button>

              <div class="separator">
                <div>
                  <p>Universidad Privada de Tacna
                  Campus Capanique s/n, Apartado postal: 126, Tacna – Perú
                  Fono-fax: 243380, 243381, 427212, Anexo 444, correo electrónico: uptvirtual@upt.edu.pe
                  </p>
                </div>
              </div>
       </form>
       </section>
    </div>
  </div>
 </div>
</body>

<?php
if(isset($_POST['usuario_log']) && isset($_POST['clave_log'])){
 require_once "./controladores/LoginControlador.php";
  $ins_login= new LoginControlador();
    echo $ins_login->iniciar_sesion_controlador();
}

?>
