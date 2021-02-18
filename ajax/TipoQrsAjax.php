<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['tipoqrs_nombre_reg'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/TipoQrsControlador.php";
        $ins_caso = new TipoQrsControlador();

            // agregar un caso
            if(isset($_POST['tipoqrs_nombre_reg']) && isset($_POST['tipoqrs_descripcion_reg']) && isset($_POST['tipoqrs_estado_reg'])){
                echo $ins_caso->agregar_tipoqrs_controlador();
            }
            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }