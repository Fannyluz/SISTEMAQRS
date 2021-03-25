<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['tipousuario_nombre_reg']) || isset($_POST['tipousuario_codigo_del']) || isset($_POST['tipoUsuario_codigo_up'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/TipoUsuarioControlador.php";
        $ins_tipoUsuario = new TipoUsuarioControlador();

            // agregar un caso
            if(isset($_POST['tipousuario_nombre_reg']) && isset($_POST['tipousuario_descripcion_reg']) && isset($_POST['tipousuario_estado_reg'])){
                echo $ins_tipoUsuario->agregar_tipousuario_controlador();
            }

            // Eliminar un tipousuario
            if(isset($_POST['tipousuario_codigo_del'])){
                echo $ins_tipoUsuario->Eliminar_tipousuario_controlador();
            }

            // Editar un tipousuario
            if(isset($_POST['tipoUsuario_codigo_up'])){
                echo $ins_tipoUsuario->Editar_tipousuario_controlador();
            }
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }