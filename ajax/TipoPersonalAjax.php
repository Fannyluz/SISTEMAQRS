<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['tiperson_nombres_reg'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/TipoPersonalControlador.php";
        $ins_tiperson = new TipoPersonalControlador();

            // agregar un caso
            if(isset($_POST['tiperson_dni_reg']) && isset($_POST['tiperson_nombres_reg']) && isset($_POST['tiperson_apellidos_reg']) && isset($_POST['tiperson_foto_reg']) && isset($_POST['tiperson_correoelectronico_reg']) && isset($_POST['tiperson_celular_reg']) && isset($_POST['tiperson_direccion_reg']) && isset($_POST['tiperson_fecha_reg']) && isset($_POST['tiperson_estado_reg'])){
                echo $ins_tiperson->agregar_tipopersonal_controlador();
            }
            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }