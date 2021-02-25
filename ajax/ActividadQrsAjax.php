<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['ACTnombres_reg'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/ActividadQrsControlador.php";
        $ins_tiperson = new ActividadQrsControlador();

            // agregar un caso
            if(isset($_POST['ACTnombres_reg']) && isset($_POST['ACTapellidos_reg']) && isset($_POST['ACTdescripcion_reg']) && isset($_POST['ACTcelular_reg']) && isset($_POST['ACTfecha_reg']) && isset($_POST['ACTestado_reg'])){
                echo $ins_tiperson->agregar_ActividadQRS_controlador();
            }
            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }