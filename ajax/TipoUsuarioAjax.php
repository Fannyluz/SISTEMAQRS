<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['tipousuario_nombre_reg']) || isset($_POST['tipousuario_codigo_del'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/TipoUsuarioControlador.php";
        $ins_caso = new TipoUsuarioControlador();

            // agregar un caso
            if(isset($_POST['tipousuario_nombre_reg']) && isset($_POST['tipousuario_descripcion_reg']) && isset($_POST['tipousuario_estado_reg'])){
                echo $ins_caso->agregar_tipousuario_controlador();
            }

            // Eliminar un tipousuario
            if(isset($_POST['tipousuario_codigo_del'])){
                echo $ins_caso->Eliminar_tipousuario_controlador();
            }
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }