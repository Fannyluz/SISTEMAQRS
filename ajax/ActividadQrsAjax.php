<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['ACTnombres_reg'])  || isset($_POST['ActividadQRS_codigo_up']) || isset($_POST['caso_buscar'])
     || isset($_POST['BuscarPorTipo']) || isset($_POST['buscar_cliente']) || isset($_POST['buscar_atendidos']) 
     || isset($_POST['buscar_pendiente']) || isset($_POST['ActividadQRS_codigo_up_info']) ){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/ActividadQrsControlador.php";
        $ins_tiperson = new ActividadQrsControlador();

            // agregar Actividad QRS
            if(isset($_POST['ACTfacultad_reg']) && isset($_POST['ACTnombres_reg']) && isset($_POST['ACTapellidos_reg']) && isset($_POST['ACTdescripcion_reg']) && isset($_POST['ACTcelular_reg']) && isset($_POST['ACTfecha_reg']) && isset($_POST['ACTestado_reg']) && isset($_POST['ACTacciones_reg'])){
                echo $ins_tiperson->agregar_ActividadQRS_controlador();
            }
            // editar un Actividad QRS
            if(isset($_POST['ActividadQRS_codigo_up'])){
                echo $ins_tiperson->Editar_ActividadQRS_controlador();
            }
            // editar dede info
            if(isset($_POST['ActividadQRS_codigo_up_info'])){
                echo $ins_tiperson->Editar_ActividadQRS_info_controlador();
            }
            //
            if(isset($_POST['caso_buscar'])){
                echo $ins_tiperson->Buscar_ActividadQRS_controlador();
            }
            if(isset($_POST['BuscarPorTipo'])){
              echo $ins_tiperson->listar_ActividadQrsAll_ReportePersonal_controlador();
            }

            if(isset($_POST['buscar_cliente'])){
                echo $ins_tiperson->buscar_cliente_prestamo_controlador();
            }

            if(isset($_POST['buscar_atendidos'])){
                echo $ins_tiperson->buscar_actividadesAtendidosPorPersonal__controlador();
            }
            if(isset($_POST['buscar_pendiente'])){
                echo $ins_tiperson->buscar_actividadesPendientesPorPersonal_controlador();
            }
           
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }