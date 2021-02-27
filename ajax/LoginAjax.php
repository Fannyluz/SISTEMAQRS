
<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['usuario']) && isset($_POST['clave']) ){
       /*---- instanciar al controlador ---*/
       require_once "../controladores/LoginControlador.php";
        $ins_login = new LoginControlador();

        echo $ins_login->cerrar_sesion_controlador();

    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }