<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['usuario_reg'])|| isset($_POST['usuariopersonaluptvirtual_codigo_del']) || isset($_POST['UsuarioPersonalUPTvirtual_codigo_up'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/UsuarioPersonalUptVirtualControlador.php";
        $ins_caso = new UsuarioPersonalUptVirtualControlador();

            // agregar un caso
            if(isset($_POST['usuario_reg']) && isset($_POST['clave_reg']) && isset($_POST['estado_reg'])){
                echo $ins_caso->agregar_usuariopersonaluptvirtual_controlador();
            }

            // Eliminar un usuario personal uptvirtual
            if(isset($_POST['usuariopersonaluptvirtual_codigo_del'])){
                echo $ins_caso->Eliminar_usuariopersonaluptvirtual_ontrolador();
            }

            // Editar un usuario personal uptvirtual
            if(isset($_POST['UsuarioPersonalUPTvirtual_codigo_up'])){
                echo $ins_caso->Editar_usuariopersonaluptvirtual_controlador();
            }
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }