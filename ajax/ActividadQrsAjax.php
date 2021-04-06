<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['ACTnombres_reg'])  || isset($_POST['ActividadQRS_codigo_up']) || isset($_POST['caso_buscar']) || isset($_POST['buscar_cliente'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/ActividadQrsControlador.php";
        $ins_tiperson = new ActividadQrsControlador();

            // agregar Actividad QRS
            if(isset($_POST['ACTfacultad_reg']) && isset($_POST['ACTnombres_reg']) && isset($_POST['ACTapellidos_reg']) && isset($_POST['ACTdescripcion_reg']) && isset($_POST['ACTcelular_reg']) && isset($_POST['ACTfecha_reg']) && isset($_POST['ACTestado_reg'])){
                echo $ins_tiperson->agregar_ActividadQRS_controlador();
            }
            // editar un Actividad QRS
            if(isset($_POST['ActividadQRS_codigo_up'])){
                echo $ins_tiperson->Editar_ActividadQRS_controlador();
            }
            if(isset($_POST['caso_buscar'])){
                echo $ins_tiperson->Buscar_ActividadQRS_controlador();
            }

            if(isset($_POST['buscar_cliente'])){
                echo $ins_tiperson->ListaActualActividadesAll();
            }

          

            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }