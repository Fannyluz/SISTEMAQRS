<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['usuario_reg'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/UsuarioPersonalUptVirtualControlador.php";
        $ins_caso = new UsuarioPersonalUptVirtualControlador();

            // agregar un caso
            if(isset($_POST['usuario_reg']) && isset($_POST['clave_reg']) && isset($_POST['estado_reg'])){
                echo $ins_caso->agregar_usuariopersonaluptvirtual_controlador();
            }
            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }