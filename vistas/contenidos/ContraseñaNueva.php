<?php 
$pagina=$_SERVER["REQUEST_URI"];
$pieces = explode("/", $pagina);
$datos_caso= $pieces[5];
?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
      <form class="form-neon FormularioAjax" action="../../../ajax/UsuarioPersonalUptVirtualAjax.php" method="POST" data-form="save" enctype="multipart/form-data" novalidate>


             <h1><i class="fa fa-home"></i>    UPT VIRTUAL</h1>

       <input type="hidden" name="cambiar_contra_upp" value="<?php echo $datos_caso ?>">



        

    <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Nueva Contraseña:</b><span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 input-group-append">
                                                <input ID="txtPassword" type="password" class="form-control" name="clave_up"   id="clave_up" placeholder="Ingrese nueva contraseña" required="required" />
                                               
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Repita la Contraseña:</b><span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 input-group-append">
                                                <input  type="password" class="form-control" name="repetirclave_up"  id="repetirclave_up" placeholder="Repita la contraseña" required="required" />
                                                </div>
                                        </div> 



<!--<p><strong>Tipo: </strong> <?php echo $datos_caso ?></p>-->

        <button type="submit" class="btn btn-" style="background-color:#10226a;color:white;">Enviar</button>

        <br>
         <a href="#" onclick="window.location.href = document.referrer; return false;">Retroceder</a>
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
</html>